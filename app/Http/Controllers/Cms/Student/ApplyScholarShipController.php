<?php

namespace App\Http\Controllers\Cms\Student;

use App\Events\StatusChanged;
use App\Http\Controllers\Controller;
use App\Models\ApplyScholarShip;
use App\Models\Notification;
use App\Models\User;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Intervention\Image\Facades\Image;
use Predis\Connection\ConnectionException;
use Webklex\PDFMerger\PDFMerger;

class ApplyScholarShipController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:apply-scholarship-list|apply-scholarship-create|apply-scholarship-update', ['only' => ['index', 'addApplyData']]);
        $this->middleware('permission:apply-scholarship-create', ['only' => ['addApply', 'addApplyData']]);
        $this->middleware('permission:apply-scholarship-update', ['only' => ['updateApply', 'updateApplyData']]);
    }

    public function index(Request $request)
    {
        $applies = ApplyScholarShip::query()->with('getUser');

        if ($request->query('std_name') || $request->query('std_email')) {
            $applies->whereHas('getUser', function ($q) use ($request) {
                if (!empty($request->query('std_name'))) {
                    $q->whereRaw("CONCAT(LOWER(first_name) , ' ' ,LOWER(last_name)) like ? ", '%' . trim(strtolower($request->std_name)) . '%');
                }

                if (!empty($request->query('std_email'))) {
                    $q->whereRaw('TRIM(LOWER(email)) like ? ', '%' . trim(strtolower($request->std_email)) . '%');
                }

            });
        }

        if ($request->query('std_city')) {
            $applies->whereRaw("LOWER(current_city) like ? ", '%' . trim(strtolower($request->std_city)) . '%');
        }

        if ($request->query('std_year')) {
            $applies->where('year', 'like', '%' . $request->std_year . '%');
        }

        if ($request->query('status')) {
            $applies->where('status', $request->status);
        }

        if ($request->query('from_date')) {
            $applies->whereDate('created_at', '>=', Carbon::parse($request->from_date)->format('Y-m-d'));
        }

        if ($request->query('to_date')) {
            $applies->whereDate('created_at', '<=', Carbon::parse($request->to_date)->format('Y-m-d'));
        }

        $applies = $applies->latest()->get();
        $years = ApplyScholarShip::YEARS;
        if (session()->has('notification')) {
            $notify = session()->get('notification');
            $notify->update([
                'is_read' => 1
            ]);
        }
        return view('cms.student.scholarship.apply.index', compact('applies', 'years'));
    }

    public function addApply()
    {
        $years = ApplyScholarShip::YEARS;
        $students = User::role('student')->where('is_block', '!=', 1)->get();
        return view('cms.student.scholarship.apply.add', compact('years', 'students'));
    }

    public function addApplyData()
    {
        $studentData = array();

        $validator = Validator::make(request()->all(), [
            'student_name' => 'required|in:' . implode(',', User::role('student')->where('is_block', '!=', 1)->pluck('id')->toArray()),
            'year' => 'required|in:' . implode(',', ApplyScholarShip::YEARS),
            'matric_board' => 'required|max:150',
            'group' => 'required|max:150',
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
            return response()->json(['errors' => $validator->errors()], 422);
        }

        $authStudent = User::role('student')->where('is_block', '!=', 1)->where('id', (int)request()->student_name)->first();

        if (empty($authStudent)) {
            return response()->json(['errors' => 'This user is blocked by administrator.'], 422);
        }

        $apply = ApplyScholarShip::where('user_id', $authStudent->id)->whereIn('status', ['pending', 'approved'])->where('year', request()->year)->first();

        if (!empty($apply)) {
            $status = $apply->status === 'approved' ? ' ' : ' applied for ';
            return response()->json(['error' => "This student already have{$status}scholarship of that year."], 422);
        }

        $studentData['user_id'] = $authStudent->id;
        if (!empty($authStudent->student_id)) {
            $studentData['student_id'] = $authStudent->student_id;
        } else {
            $studentId = sprintf("%04d", (int)$authStudent->id);
            $authStudent->update([
                'student_id' => $studentId,
            ]);
            $studentData['student_id'] = $studentId;
        }
        $studentData['year'] = request()->year;
        $studentData['fullname'] = $authStudent->full_name;
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
        $studentData['email_address'] = $authStudent->email;
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
        $studentData['group'] = request()->group;
        $studentData['status'] = 'approved';

        $student = request()->file('student_photo');
        $matric_marksheet = request()->file('marksheet_photo');
        $beneficary_cnic = request()->file('beneficary_cnic_photo');
        $parent_cnic = request()->file('father_mother_or_guardian_cnic_photo');

        if (!empty($student)) {
            $extension = $student->extension();
            $newStudentName = 'student_photo' . Carbon::now()->timestamp . '.' . $extension;
            if (!File::isDirectory(storage_path('app/public/uploads'))) {
                File::makeDirectory(storage_path('app/public/uploads'), 0755, true);
            }
            $destination = storage_path('app/public/uploads/' . $newStudentName);
            $img = Image::make($student);

            $check = $img->save($destination, 70);

            if ($check) {
                $studentData['student_photo'] = $newStudentName;
            } else {
                File::delete($destination);
                return back()->withErrors(['error', 'Student photo have not been saved!'])->withInput();
            }
        }

        if (!empty($matric_marksheet)) {
            $newMarkSheetName = 'matric_marksheet-' . Carbon::now()->timestamp . '.' . $matric_marksheet->getClientOriginalExtension();
            if (!File::isDirectory(storage_path('app/public/uploads'))) {
                File::makeDirectory(storage_path('app/public/uploads'), 0755, true);
            }
            Storage::putFileAs('public/uploads', $matric_marksheet, $newMarkSheetName);
            $studentData['marksheet_photo'] = $newMarkSheetName;
        }

        if (!empty($beneficary_cnic)) {
            $newBCNICName = 'beneficary_cnic-' . Carbon::now()->timestamp . '.' . $beneficary_cnic->getClientOriginalExtension();
            if (!File::isDirectory(storage_path('app/public/uploads'))) {
                File::makeDirectory(storage_path('app/public/uploads'), 0755, true);
            }
            Storage::putFileAs('public/uploads', $beneficary_cnic, $newBCNICName);
            $studentData['beneficary_cnic_photo'] = $newBCNICName;
        }

        if (!empty($parent_cnic)) {
            $newPCNICName = 'parent_cnic-' . Carbon::now()->timestamp . '.' . $parent_cnic->getClientOriginalExtension();
            if (!File::isDirectory(storage_path('app/public/uploads'))) {
                File::makeDirectory(storage_path('app/public/uploads'), 0755, true);
            }
            Storage::putFileAs('public/uploads', $parent_cnic, $newPCNICName);
            $studentData['parent_cnic_photo'] = $newPCNICName;
        }

        ApplyScholarShip::create($studentData);
        return response()->json(['msg' => 'Student have successfully applied for scholarship.']);
    }

    public function updateApply($applyId)
    {
        $years = ApplyScholarShip::YEARS;
        $apply = ApplyScholarShip::findOrFail($applyId);
        return view('cms.student.scholarship.apply.update', compact('years', 'apply'));
    }

    public function updateApplyData($applyId)
    {
        $apply = ApplyScholarShip::findOrFail($applyId);
        if (request()->student_photo == '' && $apply->student_photo == '') {
            return response()->json(['error' => 'The student photo field is required.'], 422);
        } else if (request()->marksheet_photo == '' && $apply->marksheet_photo == '') {
            return response()->json(['error' => 'The mark sheet photo field is required.'], 422);
        } else if (request()->beneficary_cnic_photo == '' && $apply->beneficary_cnic_photo == '') {
            return response()->json(['error' => 'The beneficary cnic photo field is required.'], 422);
        } else if (request()->father_mother_or_guardian_cnic_photo == '' && $apply->parent_cnic_photo == '') {
            return response()->json(['error' => 'The father mother or guardian cnic photo field is required.'], 422);
        }

        $studentData = array();
        $validator = Validator::make(request()->all(), [
            'year' => 'required|in:' . implode(',', ApplyScholarShip::YEARS),
            'matric_board' => 'required|max:150',
            'group' => 'required|max:150',
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
            'goals' => 'required|max:250',
            'suggestion' => 'required|max:250',
            'your_contribution' => 'required|max:250',
            'international_scolarship' => 'required|in:' . implode(',', ApplyScholarShip::CHECK_OPTIONS),
            'standarized_test' => 'required|in:' . implode(',', ApplyScholarShip::CHECK_OPTIONS),
            'english_ability_test' => 'required|in:' . implode(',', ApplyScholarShip::CHECK_OPTIONS),
            'share_any' => 'sometimes|nullable|max:250',
            'student_photo' => 'sometimes|nullable|image|mimes:jpeg,jpg,png|max:800',
            'marksheet_photo' => 'sometimes|nullable|file|mimes:jpeg,jpg,pdf|max:800',
            'beneficary_cnic_photo' => 'sometimes|nullable|file|mimes:jpeg,jpg,pdf|max:800',
            'father_mother_or_guardian_cnic_photo' => 'sometimes|nullable|file|mimes:jpeg,jpg,pdf|max:800'
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        $check = ApplyScholarShip::where('user_id', $apply->user_id)->whereIn('status', ['rejected', 'approved'])->where('year', request()->year)->first();

        if (!empty($check) && count($check) > 1) {
            $status = $apply->status === 'approved' ? ' ' : ' applied for ';
            return response()->json(['error' => "This student already have{$status}scholarship of that year."], 422);
        }

        $studentData['year'] = request()->year;
        $studentData['fullname'] = $apply->fullname;
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
        $studentData['email_address'] = $apply->email_address;
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
        $studentData['group'] = request()->group;

        $student = request()->file('student_photo');
        $matric_marksheet = request()->file('marksheet_photo');
        $beneficary_cnic = request()->file('beneficary_cnic_photo');
        $parent_cnic = request()->file('father_mother_or_guardian_cnic_photo');

        if (!empty($student)) {
            $extension = $student->extension();
            $newStudentName = 'student_photo' . Carbon::now()->timestamp . '.' . $extension;
            if (!File::isDirectory(storage_path('app/public/uploads'))) {
                File::makeDirectory(storage_path('app/public/uploads'), 0755, true);
            }
            $destination = storage_path('app/public/uploads/' . $newStudentName);
            $img = Image::make($student);

            $check = $img->save($destination, 70);
            Storage::delete('public/uploads/' . $apply->student_photo);

            if ($check) {
                $studentData['student_photo'] = $newStudentName;
            } else {
                File::delete($destination);
                return back()->withErrors(['error', 'Student photo have not been saved!'])->withInput();
            }
        }

        if (!empty($matric_marksheet)) {
            Storage::delete('public/uploads/' . $apply->marksheet_photo);
            $newMarkSheetName = 'matric_marksheet-' . Carbon::now()->timestamp . '.' . $matric_marksheet->getClientOriginalExtension();
            if (!File::isDirectory(storage_path('app/public/uploads'))) {
                File::makeDirectory(storage_path('app/public/uploads'), 0755, true);
            }
            Storage::putFileAs('public/uploads', $matric_marksheet, $newMarkSheetName);
            $studentData['marksheet_photo'] = $newMarkSheetName;
        }

        if (!empty($beneficary_cnic)) {
            Storage::delete('public/uploads/' . $apply->beneficary_cnic_photo);
            $newBCNICName = 'beneficary_cnic-' . Carbon::now()->timestamp . '.' . $beneficary_cnic->getClientOriginalExtension();
            if (!File::isDirectory(storage_path('app/public/uploads'))) {
                File::makeDirectory(storage_path('app/public/uploads'), 0755, true);
            }
            Storage::putFileAs('public/uploads', $beneficary_cnic, $newBCNICName);
            $studentData['beneficary_cnic_photo'] = $newBCNICName;
        }

        if (!empty($parent_cnic)) {
            Storage::delete('public/uploads/' . $apply->parent_cnic_photo);
            $newPCNICName = 'parent_cnic-' . Carbon::now()->timestamp . '.' . $parent_cnic->getClientOriginalExtension();
            if (!File::isDirectory(storage_path('app/public/uploads'))) {
                File::makeDirectory(storage_path('app/public/uploads'), 0755, true);
            }
            Storage::putFileAs('public/uploads', $parent_cnic, $newPCNICName);
            $studentData['parent_cnic_photo'] = $newPCNICName;
        }

        $apply->update($studentData);
        return response()->json(['msg' => 'Student applied scholarship form is updated.']);
    }

    public function detailApply($applyId)
    {
        $apply = ApplyScholarShip::findOrFail($applyId);
        return view('cms.student.scholarship.apply.detail', compact('apply'));
    }

    public function changeStatus($applyId, $status)
    {
        $apply = ApplyScholarShip::findOrFail($applyId);
        $studentId = Null;

        if ($status === 'approved') {
            $user = User::where('id', $apply->user_id)->first();
            $studentId = sprintf("%04d", (int)$apply->user_id);
            $user->update([
                'student_id' => $studentId,
            ]);
        }

        $apply->update([
            'student_id' => $studentId,
            'status' => $status,
        ]);
        // dd($apply);
        Notification::create([
            'user_id' => $apply->user_id,
            'type' => 'status-apply',
            'message' => " scholarship apply request has been {$status}."
        ]);

        try {
            event(new StatusChanged('apply', $apply));
        } catch (ConnectionException $exception) {
            return response()->json(['msg' => $exception->getMessage(), 'status' => $status]);
        };

        return response()->json(['msg' => 'Successfully status updated', 'status' => $status]);
    }

    public function generateAdmitCard($applyId)
    {
        $apply = ApplyScholarShip::with('getUser')->where('id', $applyId)->first();
        abort_if(empty($apply), 404);
        $data = [
            'name' => $apply->getUser->full_name,
            'father_name' => $apply->getUser->father_name,
            'board' => $apply->matric_board,
            'class' => '10th',
            'college_name' => $apply->name_of_college,
            'session' => $apply->year,
            'group' => $apply->group,
            'marks' => $apply->marks_in_matric,
            'address' => $apply->getUser->postal_address,
        ];

        $pdf = Pdf::loadView('admit-card', $data);

        return $pdf->stream('student_admit_card.pdf');
    }

    public function generatePdf($applyId)
    {
        $apply = ApplyScholarShip::with('getUser')->where('id', $applyId)->first();
        $pdfInput = PDF::loadView('student-scholarship-detail', compact('apply'));
        $pdfInput->render();
        file_put_contents(public_path('files/student_detail.pdf'), $pdfInput->output());

        $fileName = 'student_detail_sample.pdf';
        $pdf = \Webklex\PDFMerger\Facades\PDFMergerFacade::init();
        $pdf->addPDF(public_path('files/student_detail.pdf'), 'all');

        if (in_array('pdf', explode('.', $apply->marksheet_photo)) && file_exists(public_path('storage/uploads/'.$apply->marksheet_photo))) {
            $pdf->addPDF(public_path('storage/uploads/' . $apply->marksheet_photo), 'all');
        }
        if (in_array('pdf', explode('.', $apply->beneficary_cnic_photo)) && file_exists(public_path('storage/uploads/'.$apply->beneficary_cnic_photo))) {
            $pdf->addPDF(public_path('storage/uploads/' . $apply->beneficary_cnic_photo), 'all');
        }
        if (in_array('pdf', explode('.', $apply->parent_cnic_photo)) && file_exists(public_path('storage/uploads/'.$apply->parent_cnic_photo))) {
            $pdf->addPDF(public_path('storage/uploads/' . $apply->parent_cnic_photo), 'all');
        }

        $pdf->merge();
        $pdf->save(public_path($fileName));

        return response()->download(public_path($fileName));
    }
}
