<?php

namespace App\Http\Controllers\Cms;

use App\Http\Controllers\Controller;
use App\Jobs\SendAccountVerificationEmailJob;
use App\Models\User;
use App\Rules\EmailFormat;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use Spatie\Permission\Models\Role;

class UserManagementController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:user-list|user-create|user-update|user-delete', ['only' => ['index', 'addUserData']]);
        $this->middleware('permission:user-create', ['only' => ['addUser', 'addUserData']]);
        $this->middleware('permission:user-update', ['only' => ['updateUser', 'updateUserData']]);
        $this->middleware('permission:user-delete', ['only' => ['deleteUser']]);
    }

    public function index()
    {
        $users = User::where('id', '!=', Auth::id())->with('roles')->whereHas('roles', function ($query) {
            $query->where('name', '!=', 'super-admin');
        })->get();
        return view('cms.user-management.index', compact('users'));
    }

    public function addUser()
    {
        $roles = Role::where('name', '!=', 'super-admin')->get();
        return view('cms.user-management.add', compact('roles'));
    }

    public function addUserData()
    {
        request()->validate([
            'first_name' => 'required|regex:/^[a-zA-Z]+(?:\s[a-zA-Z]+)*$/i|max:55',
            'last_name' => 'required|regex:/^[a-zA-Z]+(?:\s[a-zA-Z]+)*$/i|max:55',
            'email' => ['required', 'email', 'unique:users,email,NULL,id,deleted_at,NULL', 'max:255', new EmailFormat()],
            'cnic' => 'sometimes|nullable|digits_between:13,13',
            'contact' => 'sometimes|nullable|digits_between:11,13',
            'role' => 'required|in:' . implode(',', Role::pluck('name')->toArray()),
            'dob' => 'sometimes|nullable|date',
            'address' => 'sometimes|nullable|string|max:150',
        ], [
            'first_name.regex' => 'The first name should not contain numbers and special characters.',
            'last_name.regex' => 'The last name should not contain numbers and special characters.'
        ], [
            'dob' => 'date of birth'
        ]);
        $user = User::create([
            'first_name' => request()->first_name,
            'last_name' => request()->last_name,
            'father_name' => request()->father_name,
            'mother_name' => request()->mother_name,
            'email' => request()->email,
            'password' => request()->password,
            'cnic' => request()->cnic,
            'contact' => request()->contact,
            'dob' => request()->dob,
            'postal_address' => request()->address,
            'marital_status' => request()->marital_status,
            'verification_token' => Str::random('50'),
            'created_by' => Auth::id()
        ]);

        $user->assignRole(request()->role);

        try {
            // dispatch(new SendAccountVerificationEmailJob($user));
            session()->flash('success', 'User successfully added.');
        } catch (\Exception $e) {
            session()->flash('error', $e->getMessage());
        }

        return redirect('/admin/manage-users');
    }

    public function updateUser($userId)
    {
        $user = User::findOrFail($userId);
        $roles = Role::where('name', '!=', 'super-admin')->get();
        $userRoles = $user->roles->pluck('name')->all();
        $userRole = implode(',', $userRoles);
        return view('cms.user-management.update', compact('user', 'roles', 'userRole'));
    }

    public function updateUserData($userId)
    {
        $user = User::findOrFail($userId);
        request()->validate([
            'first_name' => 'required|string|max:55',
            'last_name' => 'required|string|max:55' ,
            'email' => ['required', 'email', 'unique:users,email,' . $user->id . ',id', 'max:255', new EmailFormat()],
            'cnic' => 'sometimes|nullable|digits_between:13,13',
            'contact' => 'sometimes|nullable|digits_between:11,13',
            'role' => 'required|in:' . implode(',', Role::pluck('name')->toArray())
        ]);

        $user->update([
            'first_name' => request()->first_name,
            'last_name' => request()->last_name,
            'father_name' => request()->father_name,
            'mother_name' => request()->mother_name,
            'email' => request()->email,
            'cnic' => request()->cnic,
            'contact' => request()->contact,
            'dob' => request()->dob,
            'postal_address' => request()->address,
            'marital_status' => request()->marital_status,
            'updated_by' => Auth::id()
        ]);

        $user->syncRoles(request()->role);

        return redirect('/admin/manage-users')->with('success', 'User successfully updated.');
    }

    public function getUserDetail($userId)
    {
        $user = User::findOrFail($userId);
        $userRoles = $user->roles->pluck('name')->all();
        $userRole = implode(',', $userRoles);
        return view('cms.user-management.detail', compact('user', 'userRole'));
    }

    public function blockUser($userId)
    {
        $msg = 'Something went wrong.';
        $code = 400;
        $user = User::findOrFail($userId);

        if (!empty($user)) {
            $msgText = $user->is_block ? "unblock" : "blocked";
            $user->update(['is_block' => $user->is_block ? 0 : 1]);
            $msg = "User successfully {$msgText}!";
            $code = 200;
        }

        return response()->json(['msg' => $msg], $code);
    }

    public function resendVerificationEmail($verificationToken)
    {
        $user = User::where('verification_token', $verificationToken)->first();
        abort_if(empty($user), 404, "User Not Found");
        $user->update([
            'verification_token' => Str::random(50)
        ]);
        dispatch(new SendAccountVerificationEmailJob($user));
        return redirect('/admin/manage-users')->with('success', 'Verification email successfully sent.');
    }

    public function exportUsers()
    {
        $users = User::with('roles')->where('id','!=',Auth::id())->latest()->get();

        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();

        $currentDate = Carbon::now()->isoFormat('lll');
        $spreadsheet->getActiveSheet()->mergeCells('A1:L1')->getCell('A1')->setValue("DALDA FOUNDATION");
        $spreadsheet->getActiveSheet()->mergeCells('A2:L2')->getCell('A2')->setValue("ALL USERS");
        $spreadsheet->getActiveSheet()->mergeCells('A3:L3')->getCell('A3')->setValue('Report Date: ' . $currentDate);

        $spreadsheet->getActiveSheet()->getStyle('A1:L1')->getFill()->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)->getStartColor()->setARGB('306e3f');
        $spreadsheet->getActiveSheet()->getStyle('A1:L1')->getFont()
            ->setSize(18)->setBold(true)
            ->getColor()->setARGB(\PhpOffice\PhpSpreadsheet\Style\Color::COLOR_WHITE);
        $spreadsheet->getActiveSheet()->getStyle('A1:L1')->getAlignment()
            ->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER)
            ->setVertical(\PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER);
        $spreadsheet->getActiveSheet()->getRowDimension(1)->setRowHeight(30);

        $spreadsheet->getActiveSheet()->getStyle('A2:L2')->getFill()->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)->getStartColor()->setARGB('306e3f');
        $spreadsheet->getActiveSheet()->getStyle('A2:L2')->getFont()
            ->setSize(15)->setBold(true)
            ->getColor()->setARGB(\PhpOffice\PhpSpreadsheet\Style\Color::COLOR_WHITE);
        $spreadsheet->getActiveSheet()->getStyle('A2:L2')->getAlignment()
            ->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER)
            ->setVertical(\PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER);

        $spreadsheet->getActiveSheet()->getStyle('A3:L3')->getFill()->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)->getStartColor()->setARGB('306e3f');
        $spreadsheet->getActiveSheet()->getStyle('A3:L3')->getFont()
            ->setSize(12)->setBold(true)
            ->getColor()->setARGB(\PhpOffice\PhpSpreadsheet\Style\Color::COLOR_WHITE);

        $spreadsheet->getActiveSheet()->getStyle('A3:L3')->getAlignment()
            ->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER)
            ->setVertical(\PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER);
        $spreadsheet->getActiveSheet()->getRowDimension(3)->setRowHeight(18);

        $header = 4;

        $spreadsheet->getActiveSheet()->getStyle('A' . $header . ':L' . $header)->getFill()->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)->getStartColor()->setARGB('EBEBEB');
        $spreadsheet->getActiveSheet()->getStyle('A' . $header . ':L' . $header)->getFont()->setBold(true);

        foreach (range('A', 'L') as $col) {
            $sheet->getColumnDimension($col)->setAutoSize(true);
        }

        $sheet
            ->setCellValue('A' . $header, 'FULL NAME')
            ->setCellValue('B' . $header, 'FATHER NAME')
            ->setCellValue('C' . $header, 'MOTHER NAME')
            ->setCellValue('D' . $header, 'STUDENT ID')
            ->setCellValue('E' . $header, 'CNIC')
            ->setCellValue('F' . $header, 'EMAIL')
            ->setCellValue('G' . $header, 'CONTACT')
            ->setCellValue('H' . $header, 'GENDER')
            ->setCellValue('I' . $header, 'POSTAL ADDRESS')
            ->setCellValue('J' . $header, 'BLOCKED')
            ->setCellValue('K' . $header, 'VERIFIED')
            ->setCellValue('L' . $header, 'USER ROLE');

        foreach ($users as $key => $user) {
            $key += 5;

            $sheet
                ->setCellValue('A' . $key, $user->full_name)
                ->setCellValue('B' . $key, $user->father_name)
                ->setCellValue('C' . $key, $user->mother_name)
                ->setCellValue('D' . $key, $user->student_id)
                ->setCellValue('E' . $key, $user->cnic)
                ->setCellValue('F' . $key, $user->email)
                ->setCellValue('G' . $key, $user->contact)
                ->setCellValue('H' . $key, $user->gender)
                ->setCellValue('I' . $key, $user->postal_address)
                ->setCellValue('J' . $key, $user->is_block ? 'Yes' : 'No')
                ->setCellValue('K' . $key, $user->is_verified ? 'Yes' : 'No')
                ->setCellValue('L' . $key, $user->roles()->first() ? ucwords($user->roles()->first()->name) : '');
        }

        if (!File::isDirectory(getAbsolutePath() . '/excels')) {
            File::makeDirectory(getAbsolutePath() . '/excels', 0777, true, true);
        }
        $writer = new Xlsx($spreadsheet);
        $writer->save('./excels/users.xlsx');
        return response()->json('/excels/users.xlsx', 200);
    }
}
