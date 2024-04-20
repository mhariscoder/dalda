<?php

namespace App\Http\Controllers\FrontEnd\Student;

use App\Http\Controllers\Controller;
use App\Jobs\FormSubmittedJob;
use App\Models\ApplyScholarShip;
use App\Models\Notification;
use App\Models\User;
use Barryvdh\DomPDF\PDF;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Intervention\Image\Facades\Image;
use Predis\Connection\ConnectionException;

class  ApplyScholarShipController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:student-apply-scholarship-list|student-apply-scholarship-create', ['only' => ['index','addStudentApplyData']]);
        $this->middleware('permission:student-apply-scholarship-create', ['only' => ['addStudentApply','addStudentApplyData']]);
    }

    public function index()
    {
        $applicant = ApplyScholarShip::where('user_id', Auth::user()->id)->get();
        if(session()->has('notification'))
        {
            $notify = session()->get('notification');
            $notify->update([
                'is_read' => 1
            ]);
        }
        return view('frontend.student.scholarship.apply.index', compact('applicant'));
    }

    public function addStudentApply()
    {
        $years = ApplyScholarShip::YEARS;
        return view('frontend.student.scholarship.apply.add', compact('years'));
    }

    public function addStudentApplyData()
    {
        $studentData = array();
        $validator = Validator::make(request()->all(),[
            'year' => 'required|in:' . implode(',', ApplyScholarShip::YEARS),
            'matric_board' => 'required|max:150',
            'marks_in_matric' => 'required|max:9|regex:/^[1-9]{1}[0-9]{2,3}\/[0-9]{3,4}$/i',
            'current_city' => 'required|max:100',
            'beneficary_name' => 'required|max:100',
            'beneficary_iban_number' => 'required|max:34',
            'beneficary_bank' => 'required|max:150',
            'beneficary_cnic' => 'required|digits_between:13,15',
            'beneficary_bank_address' => 'required|max:150',
            'cnic_number' => 'required|digits_between:13,15',
            'mobile_number' => 'required|digits_between:11,13',
            'whatsapp_number' => 'sometimes|nullable|digits_between:11,13',
            'group' => 'required|max:250',

            'goals' => 'required|max:250',
            'suggestion' => 'required|max:250',
            'your_contribution' => 'required|max:250',
            'international_scolarship' => 'required|in:' . implode(',', ApplyScholarShip::CHECK_OPTIONS),
            'standarized_test' => 'required|in:' . implode(',', ApplyScholarShip::CHECK_OPTIONS),
            'english_ability_test' => 'required|in:' . implode(',', ApplyScholarShip::CHECK_OPTIONS),
            'share_any' => 'sometimes|nullable|max:250',
            'student_photo' => 'required|image|mimes:jpeg,jpg,png|max:800',
            'marksheet_photo' => 'required|file|mimes:jpeg,jpg,pdf|max:800',
            'beneficary_cnic_photo' => 'required|file|mimes:jpeg,jpg,pdf|max:800',
            'father_mother_or_guardian_cnic_photo' => 'required|file|mimes:jpeg,jpg,pdf|max:800'
        ]);
        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()],422);
        }

        $user = Auth::user();

        $apply = ApplyScholarShip::where('user_id',$user->id)->whereIn('status',['pending','approved'])->where('year',request()->year)->first();

        if(!empty($apply))
        {
            $status = $apply->status === 'approved' ? ' ' : ' applied for ';
            return response()->json(['error' => "You already have{$status}scholarship of that year."],422);
        }

        $studentData['user_id'] = $user->id;
        if (!empty($user->student_id)) {
            $studentData['student_id'] = $user->student_id;
        }
        $studentData['year'] = request()->year;
        $studentData['fullname'] = $user->full_name;
        $studentData['matric_board'] = request()->matric_board;
        $studentData['marks_in_matric'] = request()->marks_in_matric;
        $studentData['current_city'] = request()->current_city;
        $studentData['beneficary_name'] = request()->beneficary_name;
        $studentData['beneficary_iban_number'] = request()->beneficary_iban_number;
        $studentData['beneficary_bank'] = request()->beneficary_bank;
        $studentData['beneficary_cnic'] = request()->beneficary_cnic;
        $studentData['beneficary_bank_address'] = request()->beneficary_bank_address;
        $studentData['cnic_number'] = request()->cnic_number;
        $studentData['mobile_number'] = request()->mobile_number;
        $studentData['whatsapp_number'] = request()->whatsapp_number;
        $studentData['email_address'] = $user->email;
        $studentData['group'] = request()->group;

        $studentData['goals'] = request()->goals;
        $studentData['suggestion'] = request()->suggestion;
        $studentData['your_contribution'] = request()->your_contribution;
        $studentData['international_scolarship'] = request()->international_scolarship;
        $studentData['standarized_test'] = request()->standarized_test;
        $studentData['english_ability_test'] = request()->english_ability_test;
        $studentData['share_any'] = request()->share_any;
        $studentData['name_of_college'] = request()->name_of_college;
        $studentData['postal_address_of_college'] = request()->postal_address_of_college;
        $studentData['telephone_of_college'] = request()->telephone_of_college;
        $studentData['principal_name'] = request()->principal_name;
        $studentData['principal_number'] = request()->principal_number;
        $studentData['college_email'] = request()->college_email;
        $studentData['teacher_name1'] = request()->teacher_name1;
        $studentData['teach_cell_no1'] = request()->teach_cell_no1;
        $studentData['teacher_address1'] = request()->teacher_address1;
        $studentData['teacher_name2'] = request()->teacher_name2;
        $studentData['teach_cell_no2'] = request()->teach_cell_no2;
        $studentData['teacher_address2'] = request()->teacher_address2;
        $studentData['family_members'] = request()->family_members;
        $studentData['monthly_income'] = request()->monthly_income;
        $studentData['home_in_sqr_yards'] = request()->home_in_sqr_yards;
        $studentData['source_of_income'] = request()->source_of_income;
        $studentData['any_scholarship'] = request()->any_scholarship;
        $studentData['status'] = 'pending';

        $student = request()->file('student_photo');
        $matric_marksheet = request()->file('marksheet_photo');
        $beneficary_cnic = request()->file('beneficary_cnic_photo');
        $parent_cnic = request()->file('father_mother_or_guardian_cnic_photo');

        if (!empty($student)) {
            $extension = $student->extension();
            $newStudentName = 'student_photo' . Carbon::now()->timestamp . '.' . $extension;
            if(!File::isDirectory(storage_path('app/public/uploads'))){
                File::makeDirectory(storage_path('app/public/uploads'),0755, true);
            }
            $destination = storage_path('app/public/uploads/'. $newStudentName);
            $img = Image::make($student);

            $check = $img->save($destination, 70);
            //$check = $student->move(public_path('storage/uploads/'), $newStudentName);

            if ($check) {
                $studentData['student_photo'] = $newStudentName;
            } else {
                File::delete($destination);
                return back()->withErrors(['error', 'Student photo have not been saved!'])->withInput();
            }






        }

        if (!empty($matric_marksheet)) {
            $newMarkSheetName = 'matric_marksheet-' . Carbon::now()->timestamp . '.' . $matric_marksheet->getClientOriginalExtension();
            if(!File::isDirectory(storage_path('app/public/uploads'))){
                File::makeDirectory(storage_path('app/public/uploads'),0755, true);
            }
            Storage::putFileAs('public/uploads',$matric_marksheet,$newMarkSheetName);
            $studentData['marksheet_photo'] = $newMarkSheetName;
        }

        if (!empty($beneficary_cnic)) {
            $newBCNICName = 'beneficary_cnic-' . Carbon::now()->timestamp . '.' . $beneficary_cnic->getClientOriginalExtension();
            if(!File::isDirectory(storage_path('app/public/uploads'))){
                File::makeDirectory(storage_path('app/public/uploads'),0755, true);
            }
            Storage::putFileAs('public/uploads',$beneficary_cnic,$newBCNICName);
            $studentData['beneficary_cnic_photo'] = $newBCNICName;
        }

        if (!empty($parent_cnic)) {
            $newPCNICName = 'parent_cnic-' . Carbon::now()->timestamp . '.' . $parent_cnic->getClientOriginalExtension();
            if(!File::isDirectory(storage_path('app/public/uploads'))){
                File::makeDirectory(storage_path('app/public/uploads'),0755, true);
            }
            Storage::putFileAs('public/uploads',$parent_cnic,$newPCNICName);
            $studentData['parent_cnic_photo'] = $newPCNICName;
        }

        ApplyScholarShip::create($studentData);

        $admin = User::role('super-admin')->first()->id;

        Notification::create([
            'user_id' => Auth::id(),
            'type' => 'apply',
            'message' => ' is applied for scholarship.'
        ]);

        try {
            event(new \App\Events\FormSubmitted('apply', $admin));
        } catch (\Exception $exception) {
            session()->flash('error',$exception->getMessage());
        };

        return response()->json(['msg' => 'You have successfully applied for scholarship.']);
    }

    public function detailStudentApply($applyId)
    {
        $apply = ApplyScholarShip::findOrFail($applyId);
        abort_if(auth()->id() != $apply->user_id,403);
        return view('frontend.student.scholarship.apply.detail', compact('apply'));
    }

    public function generateAdmitCard($applyId)
    {
        $apply = ApplyScholarShip::with('getUser')->where('id',$applyId)->first();
        abort_if(empty($apply),404);
        abort_if(auth()->id() != $apply->user_id,403);
        $data = [
            'name' => $apply->getUser->full_name,
            'father_name' => $apply->getUser->father_name,
            'board' => $apply->matric_board,
            'class' => '10th',
            'college_name' => $apply->name_of_college,
            'session' => $apply->year,
            'group' => $apply->year,
            'marks' => $apply->marks_in_matric,
            'address' => $apply->getUser->postal_address,
        ];

        $pdf = \Barryvdh\DomPDF\Facade\Pdf::loadView('admit-card',$data);

        return $pdf->stream('student_admit_card.pdf');
    }
}
