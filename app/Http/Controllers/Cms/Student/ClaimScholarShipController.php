<?php

namespace App\Http\Controllers\Cms\Student;

use App\Events\StatusChanged;
use App\Http\Controllers\Controller;
use App\Models\ApplyScholarShip;
use App\Models\ClaimScholarShip;
use App\Models\Installment;
use App\Models\Notification;
use App\Models\UploadDocument;
use App\Models\User;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Intervention\Image\Facades\Image;
use Predis\Connection\ConnectionException;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\ClaimForScholarShipImport;

class ClaimScholarShipController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:claim-scholarship-list|claim-scholarship-create|claim-scholarship-update', ['only' => ['index', 'addClaimData']]);
        $this->middleware('permission:claim-scholarship-create', ['only' => ['addClaim', 'addClaimData']]);
        $this->middleware('permission:claim-scholarship-update', ['only' => ['updateClaim', 'updateClaimData']]);
    }

    public function index(Request $request)
    {
        $claims = ClaimScholarShip::query();

        if ($request->query('std_name') || $request->query('std_email')) {
            $claims->whereHas('getUser', function ($q) use ($request) {
                if (!empty($request->query('std_name'))) {
                    $q->whereRaw("CONCAT(LOWER(first_name) , ' ' ,LOWER(last_name)) like ? ", '%' . trim(strtolower($request->std_name)) . '%');
                }

                if (!empty($request->query('std_email'))) {
                    $q->whereRaw('TRIM(LOWER(email)) like ? ', '%' . trim(strtolower($request->std_email)) . '%');
                }

            });
        }

        if ($request->query('std_city')) {
            $claims->whereRaw("LOWER(current_city) like ? ", '%' . trim(strtolower($request->std_city)) . '%');
        }

        if ($request->query('status')) {
            $claims->where('status', $request->status);
        }

        if ($request->query('from_date')) {
            $claims->whereDate('created_at', '>=', Carbon::parse($request->from_date)->format('Y-m-d'));
        }

        if ($request->query('to_date')) {
            $claims->whereDate('created_at', '<=', Carbon::parse($request->to_date)->format('Y-m-d'));
        }

        $claims = $claims->latest()->get();
        if (session()->has('notification')) {
            $notify = session()->get('notification');
            $notify->update([
                'is_read' => 1
            ]);
        }
        return view('cms.student.scholarship.claim.index', compact('claims'));
    }

    public function addClaim()
    {
        $students = User::where('student_id', '!=', NULL)->get();
        $years = ApplyScholarShip::YEARS;
        
        return view('cms.student.scholarship.claim.add', compact('students', 'years'));
    }

    public function addClaimData()
    {
        $studentData = array();

        $validator = Validator::make(request()->all(), [
            // 'student_id' => 'required|unique:claim_form,student_id,NULL,id,deleted_at,NULL',
            'fullname' => 'required|max:100',
            'board_intermediate' => 'required|max:100',
            'marks_in_xi' => 'required|max:7|regex:/^[1-5]{1}[0-9]{2}\/[0-9]{3}$/i',
            'marks_in_xii' => 'sometimes|nullable|max:9|regex:/^[1-9]{1}[0-9]{2,3}\/[0-9]{3,4}$/i',
            'marks_in_bachelor_one' => 'sometimes|nullable|max:4',
            'marks_in_bachelor_two' => 'sometimes|nullable|max:4',
            'marks_in_bachelor_three' => 'sometimes|nullable|max:4',
            'marks_in_bachelor_four' => 'sometimes|nullable|max:4',
            'marks_in_bachelor_five' => 'sometimes|nullable|max:4',
            'degree_name' => 'sometimes|nullable|max:100',
            'current_city' => 'required|max:100',
            'beneficary_name' => 'required|max:100',
            'beneficary_iban_number' => 'required|max:34',
            'beneficary_bank' => 'required|max:150',
            'beneficary_cnic' => 'required|digits_between:13,15',
            // 'beneficary_bank_address' => 'required|max:150',
            'cnic_number' => 'required|digits_between:13,15',
            'mobile_number' => 'required|digits_between:11,13',
            'whatsapp_number' => 'sometimes|nullable|digits_between:11,13',
            // 'goals' => 'required|max:250',
            // 'suggestion' => 'required|max:250',
            // 'your_contribution' => 'required|max:250',
            'international_scolarship' => 'required|in:' . implode(',', ApplyScholarShip::CHECK_OPTIONS),
            'standarized_test' => 'required|in:' . implode(',', ApplyScholarShip::CHECK_OPTIONS),
            'english_ability_test' => 'required|in:' . implode(',', ApplyScholarShip::CHECK_OPTIONS),
            'share_any' => 'sometimes|nullable|max:250',
            
            'student_photo' => 'required|image|mimes:jpeg,jpg,png|max:800',
            'matric_photo' => 'required|file|mimes:jpeg,jpg,pdf|max:800',
            'intermediate_photo' => 'required|file|mimes:jpeg,jpg,pdf|max:800',
            'bachelor_one_photo' => 'sometimes|nullable|file|mimes:jpeg,jpg,pdf|max:800',
            'bachelor_two_photo' => 'sometimes|nullable|file|mimes:jpeg,jpg,pdf|max:800',
            'bachelor_three_photo' => 'sometimes|nullable|file|mimes:jpeg,jpg,pdf|max:800',
            'bachelor_four_photo' => 'sometimes|nullable|file|mimes:jpeg,jpg,pdf|max:800',
            'bachelor_five_photo' => 'sometimes|nullable|file|mimes:jpeg,jpg,pdf|max:800',
            'beneficary_cnic_photo' => 'required|file|mimes:jpeg,jpg,pdf|max:800',
            'father_mother_or_guardian_cnic_photo' => 'required|file|mimes:jpeg,jpg,pdf|max:800'
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        $authStudent = ApplyScholarShip::with(['getUser' => function ($query) {
            $query->where('student_id', request()->student_id);
        }])->where('status', '=', 'approved')->whereHas('getUser', function ($query) {
            $query->where('student_id', request()->student_id);
        })->first();
        
        if (empty($authStudent)) {
            return response()->json(['error' => 'This user is blocked by administrator.'], 422);
        }

        if (empty($authStudent) && !empty(request()->student_id)) {
            return response()->json(['error' => "This student don't have an permission of claim form."], 422);
        }

        $studentData['user_id'] = $authStudent->getUser->id;
        $studentData['student_id'] = $authStudent->student_id;
        $studentData['fullname'] = request()->fullname;
        $studentData['matric_board'] = request()->matric_board;
        $studentData['board_intermediate'] = request()->board_intermediate;
        $studentData['marks_in_xi'] = request()->marks_in_xi;
        $studentData['marks_in_xii'] = request()->marks_in_xii;
        $studentData['marks_in_bachelor_one'] = request()->marks_in_bachelor_one;
        $studentData['marks_in_bachelor_two'] = request()->marks_in_bachelor_two;
        $studentData['marks_in_bachelor_three'] = request()->marks_in_bachelor_three;
        $studentData['marks_in_bachelor_four'] = request()->marks_in_bachelor_four;
        $studentData['marks_in_bachelor_five'] = request()->marks_in_bachelor_five;
        $studentData['degree_name'] = request()->degree_name;
        $studentData['current_city'] = request()->current_city;
        $studentData['beneficary_name'] = request()->beneficary_name;
        $studentData['beneficary_iban_number'] = request()->beneficary_iban_number;
        $studentData['beneficary_bank'] = request()->beneficary_bank;
        $studentData['beneficary_cnic'] = request()->beneficary_cnic;
        $studentData['beneficary_bank_address'] = request()->beneficary_bank_address;
        $studentData['cnic_number'] = request()->cnic_number;
        $studentData['mobile_number'] = request()->mobile_number;
        $studentData['whatsapp_number'] = request()->whatsapp_number;
        $studentData['email_address'] = $authStudent->getUser->email;
        $studentData['goals'] = request()->goals;
        $studentData['suggestion'] = request()->suggestion;
        // $studentData['your_contribution'] = request()->your_contribution;
        $studentData['international_scolarship'] = request()->international_scolarship;
        $studentData['standarized_test'] = request()->standarized_test;
        $studentData['english_ability_test'] = request()->english_ability_test;
        $studentData['share_any'] = request()->share_any;
        $studentData['intermediate_repeated'] = request()->intermediate_repeated;
        $studentData['status'] = 'approved';

        $student = request()->file('student_photo');
        $matric_marksheet = request()->file('matric_photo');
        $intermediate_marksheet = request()->file('intermediate_photo');
        $bcone_marksheet = request()->file('bachelor_one_photo');
        $bctwo_marksheet = request()->file('bachelor_two_photo');
        $bcthree_marksheet = request()->file('bachelor_three_photo');
        $bcfour_marksheet = request()->file('bachelor_four_photo');
        $bcfive_marksheet = request()->file('bachelor_five_photo');
        $beneficary_cnic = request()->file('beneficary_cnic_photo');
        $parent_cnic = request()->file('parent_cnic_photo');

        // new fields
        $studentData['other_degree_option'] = request()->other_degree_option;
        $studentData['father_name'] = request()->father_name;
        $studentData['year'] = request()->year;
        $studentData['achieved_position'] = request()->achieved_position;
        $studentData['current_college_institute_university'] = request()->current_college_institute_university;
        // $studentData['relatives_name'] = request()->relatives_name;
        // $studentData['relatives_email'] = request()->relatives_email;
        // $studentData['relatives_contact'] = request()->relatives_contact;
        // $studentData['relatives_address'] = request()->relatives_address;
        $studentData['relatives_detail'] = request()->relatives_detail;

        if (!empty($student)) {
            $extension = $student->extension();
            $newStudentName = 'student_photo' . Carbon::now()->timestamp . '.' . $extension;
            if (!File::isDirectory(storage_path('app/public/uploads'))) {
                File::makeDirectory(storage_path('app/public/uploads'), 0755, true);
            }
            $destination = storage_path('app/public/uploads/') . $newStudentName;
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
            $newMatricMarkSheetName = 'claim_matric_marksheet-' . Carbon::now()->timestamp . '.' . $matric_marksheet->getClientOriginalExtension();
            if (!File::isDirectory(storage_path('app/public/uploads'))) {
                File::makeDirectory(storage_path('app/public/uploads'), 0755, true);
            }
            Storage::putFileAs('public/uploads', $matric_marksheet, $newMatricMarkSheetName);
            $studentData['matric_photo'] = $newMatricMarkSheetName;
        }

        if (!empty($intermediate_marksheet)) {
            $newIntermediateMarkSheetName = 'intermediate_marksheet-' . Carbon::now()->timestamp . '.' . $intermediate_marksheet->getClientOriginalExtension();
            if (!File::isDirectory(storage_path('app/public/uploads'))) {
                File::makeDirectory(storage_path('app/public/uploads'), 0755, true);
            }
            Storage::putFileAs('public/uploads', $intermediate_marksheet, $newIntermediateMarkSheetName);
            $studentData['intermediate_photo'] = $newIntermediateMarkSheetName;
        }

        if (!empty($bcone_marksheet)) {
            $newBconeMarkSheetName = 'bachone_marksheet-' . Carbon::now()->timestamp . '.' . $bcone_marksheet->getClientOriginalExtension();
            if (!File::isDirectory(storage_path('app/public/uploads'))) {
                File::makeDirectory(storage_path('app/public/uploads'), 0755, true);
            }
            Storage::putFileAs('public/uploads', $bcone_marksheet, $newBconeMarkSheetName);
            $studentData['bachelor_one_photo'] = $newBconeMarkSheetName;
        }

        if (!empty($bctwo_marksheet)) {
            $newBctwoMarkSheetName = 'bachtwo_marksheet-' . Carbon::now()->timestamp . '.' . $bctwo_marksheet->getClientOriginalExtension();
            if (!File::isDirectory(storage_path('app/public/uploads'))) {
                File::makeDirectory(storage_path('app/public/uploads'), 0755, true);
            }
            Storage::putFileAs('public/uploads', $bctwo_marksheet, $newBctwoMarkSheetName);
            $studentData['bachelor_two_photo'] = $newBctwoMarkSheetName;
        }

        if (!empty($bcthree_marksheet)) {
            $newBcthreeMarkSheetName = 'bachthree_marksheet-' . Carbon::now()->timestamp . '.' . $bcthree_marksheet->getClientOriginalExtension();
            if (!File::isDirectory(storage_path('app/public/uploads'))) {
                File::makeDirectory(storage_path('app/public/uploads'), 0755, true);
            }
            Storage::putFileAs('public/uploads', $bcthree_marksheet, $newBcthreeMarkSheetName);
            $studentData['bachelor_three_photo'] = $newBcthreeMarkSheetName;
        }

        if (!empty($bcfour_marksheet)) {
            $newBcfourMarkSheetName = 'bachfour_marksheet-' . Carbon::now()->timestamp . '.' . $bcfour_marksheet->getClientOriginalExtension();
            if (!File::isDirectory(storage_path('app/public/uploads'))) {
                File::makeDirectory(storage_path('app/public/uploads'), 0755, true);
            }
            Storage::putFileAs('public/uploads', $bcfour_marksheet, $newBcfourMarkSheetName);
            $studentData['bachelor_four_photo'] = $newBcfourMarkSheetName;
        }

        if (!empty($bcfive_marksheet)) {
            $newBcfiveMarkSheetName = 'bachfive_marksheet-' . Carbon::now()->timestamp . '.' . $bcfive_marksheet->getClientOriginalExtension();
            if (!File::isDirectory(storage_path('app/public/uploads'))) {
                File::makeDirectory(storage_path('app/public/uploads'), 0755, true);
            }
            Storage::putFileAs('public/uploads', $bcfive_marksheet, $newBcfiveMarkSheetName);
            $studentData['bachelor_five_photo'] = $newBcfiveMarkSheetName;
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

        $claim = ClaimScholarShip::create($studentData);

        if (!is_null(request()->installments) && is_array(request()->installments)) {
            $installment = [];
            foreach (\request()->installments as $key => $val) {
                $installment[] = [
                    'claim_id' => $claim->id,
                    'inst_number' => $val,
                    'year_of_receiving' => \request()->year_of_receiving[$key],
                    'received_yes' => \request()->received_yes[$key],
                    'if_no_reason' => \request()->if_no_reason[$key],
                    'amount_received' => \request()->amount_received[$key]
                ];
            }
            Installment::insert($installment);
        }

        return response()->json(['msg' => 'Student have successfully claimed for scholarship.']);
    }

    public function updateClaim($claimId)
    {
        $claim = ClaimScholarShip::findOrFail($claimId);
        $years = ApplyScholarShip::YEARS;
        return view('cms.student.scholarship.claim.update', compact('claim', 'years'));
    }

    public function updateClaimData($claimId)
    {
        $claim = ClaimScholarShip::findOrFail($claimId);

        if (request()->student_photo == '' && $claim->student_photo == '') {
            return response()->json(['error' => 'The student photo field is required.'], 422);
        } else if (request()->matric_photo == '' && $claim->matric_photo == '') {
            return response()->json(['error' => 'The matric mark sheet photo field is required.'], 422);
        } else if (request()->intermediate_photo == '' && $claim->intermediate_photo == '') {
            return response()->json(['error' => 'The intermediate mark sheet photo field is required.'], 422);
        } else if (request()->beneficary_cnic_photo == '' && $claim->beneficary_cnic_photo == '') {
            return response()->json(['error' => 'The beneficary cnic photo field is required.'], 422);
        } else if (request()->father_mother_or_guardian_cnic_photo == '' && $claim->parent_cnic_photo == '') {
            return response()->json(['error' => 'The father mother or guardian cnic photo field is required.'], 422);
        }

        $studentData = array();
        $validator = Validator::make(request()->all(), [
            'board_intermediate' => 'required|max:100',
            'marks_in_xi' => 'required|max:7|regex:/^[1-5]{1}[0-9]{2}\/5[0-9]{2}$/i',
            'marks_in_xii' => 'sometimes|nullable|max:9|regex:/^[1-9]{1}[0-9]{2,3}\/[0-9]{3,4}$/i',
            'marks_in_bachelor_one' => 'sometimes|nullable|max:4',
            'marks_in_bachelor_two' => 'sometimes|nullable|max:4',
            'marks_in_bachelor_three' => 'sometimes|nullable|max:4',
            'marks_in_bachelor_four' => 'sometimes|nullable|max:4',
            'marks_in_bachelor_five' => 'sometimes|nullable|max:4',
            'degree_name' => 'sometimes|nullable|max:100',
            'current_city' => 'required|max:100',
            'beneficary_name' => 'required|max:100',
            'beneficary_iban_number' => 'required|max:34',
            'beneficary_bank' => 'required|max:150',
            'beneficary_cnic' => 'required|digits_between:13,15',
            // 'beneficary_bank_address' => 'required|max:150',
            'cnic_number' => 'required|digits_between:13,15',
            'mobile_number' => 'required|digits_between:11,13',
            'whatsapp_number' => 'sometimes|nullable|digits_between:11,13',
            // 'goals' => 'required|max:250',
            // 'suggestion' => 'required|max:250',
            // 'your_contribution' => 'required|max:250',
            'international_scolarship' => 'required|in:' . implode(',', ApplyScholarShip::CHECK_OPTIONS),
            'standarized_test' => 'required|in:' . implode(',', ApplyScholarShip::CHECK_OPTIONS),
            'english_ability_test' => 'required|in:' . implode(',', ApplyScholarShip::CHECK_OPTIONS),
            'share_any' => 'sometimes|nullable|max:250',
            'student_photo' => 'sometimes|nullable|image|mimes:jpeg,jpg,png|max:800',
            'matric_photo' => 'sometimes|nullable|file|mimes:jpeg,jpg,pdf|max:800',
            'intermediate_photo' => 'sometimes|nullable|file|mimes:jpeg,jpg,pdf|max:800',
            'bachelor_one_photo' => 'sometimes|nullable|file|mimes:jpeg,jpg,pdf|max:800',
            'bachelor_two_photo' => 'sometimes|nullable|file|mimes:jpeg,jpg,pdf|max:800',
            'bachelor_three_photo' => 'sometimes|nullable|file|mimes:jpeg,jpg,pdf|max:800',
            'bachelor_four_photo' => 'sometimes|nullable|file|mimes:jpeg,jpg,pdf|max:800',
            'bachelor_five_photo' => 'sometimes|nullable|file|mimes:jpeg,jpg,pdf|max:800',
            'beneficary_cnic_photo' => 'sometimes|nullable|file|mimes:jpeg,jpg,pdf|max:800',
            'father_mother_or_guardian_cnic_photo' => 'sometimes|nullable|file|mimes:jpeg,jpg,pdf|max:800'
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        $studentData['student_id'] = $claim->student_id;
        $studentData['fullname'] = $claim->fullname;
        $studentData['matric_board'] = request()->matric_board;
        $studentData['board_intermediate'] = request()->board_intermediate;
        $studentData['marks_in_xi'] = request()->marks_in_xi;
        $studentData['marks_in_xii'] = request()->marks_in_xii;
        $studentData['marks_in_bachelor_one'] = request()->marks_in_bachelor_one;
        $studentData['marks_in_bachelor_two'] = request()->marks_in_bachelor_two;
        $studentData['marks_in_bachelor_three'] = request()->marks_in_bachelor_three;
        $studentData['marks_in_bachelor_four'] = request()->marks_in_bachelor_four;
        $studentData['marks_in_bachelor_five'] = request()->marks_in_bachelor_five;
        $studentData['degree_name'] = request()->degree_name;
        $studentData['current_city'] = request()->current_city;
        $studentData['beneficary_name'] = request()->beneficary_name;
        $studentData['beneficary_iban_number'] = request()->beneficary_iban_number;
        $studentData['beneficary_bank'] = request()->beneficary_bank;
        $studentData['beneficary_cnic'] = request()->beneficary_cnic;
        $studentData['beneficary_bank_address'] = request()->beneficary_bank_address;
        $studentData['cnic_number'] = request()->cnic_number;
        $studentData['mobile_number'] = request()->mobile_number;
        $studentData['whatsapp_number'] = request()->whatsapp_number;
        $studentData['email_address'] = $claim->email_address;
        $studentData['goals'] = request()->goals;
        $studentData['suggestion'] = request()->suggestion;
        // $studentData['your_contribution'] = request()->your_contribution;
        $studentData['international_scolarship'] = request()->international_scolarship;
        $studentData['standarized_test'] = request()->standarized_test;
        $studentData['english_ability_test'] = request()->english_ability_test;
        $studentData['share_any'] = request()->share_any;
        $studentData['intermediate_repeated'] = request()->intermediate_repeated;

        $student = request()->file('student_photo');
        $matric_marksheet = request()->file('matric_photo');
        $intermediate_marksheet = request()->file('intermediate_photo');
        $bcone_marksheet = request()->file('bachelor_one_photo');
        $bctwo_marksheet = request()->file('bachelor_two_photo');
        $bcthree_marksheet = request()->file('bachelor_three_photo');
        $bcfour_marksheet = request()->file('bachelor_four_photo');
        $bcfive_marksheet = request()->file('bachelor_five_photo');
        $beneficary_cnic = request()->file('beneficary_cnic_photo');
        $parent_cnic = request()->file('father_mother_or_guardian_cnic_photo');

        // new fields
        $studentData['other_degree_option'] = request()->other_degree_option;
        $studentData['father_name'] = request()->father_name;
        $studentData['year'] = request()->year;
        $studentData['achieved_position'] = request()->achieved_position;
        $studentData['current_college_institute_university'] = request()->current_college_institute_university;
        // $studentData['relatives_name'] = request()->relatives_name;
        // $studentData['relatives_email'] = request()->relatives_email;
        // $studentData['relatives_contact'] = request()->relatives_contact;
        // $studentData['relatives_address'] = request()->relatives_address;
        $studentData['relatives_detail'] = request()->relatives_detail;

        if (!empty($student)) {
            Storage::delete('public/uploads/' . $claim->student_photo);
            $extension = $student->extension();
            $newStudentName = 'student_photo' . Carbon::now()->timestamp . '.' . $extension;
            if (!File::isDirectory(storage_path('app/public/uploads'))) {
                File::makeDirectory(storage_path('app/public/uploads'), 0755, true);
            }
            $destination = storage_path('app/public/uploads/') . $newStudentName;
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
            Storage::delete('public/uploads/' . $claim->student_photo);
            $newMatricMarkSheetName = 'claim_matric_marksheet-' . Carbon::now()->timestamp . '.' . $matric_marksheet->getClientOriginalExtension();
            if (!File::isDirectory(storage_path('app/public/uploads'))) {
                File::makeDirectory(storage_path('app/public/uploads'), 0755, true);
            }
            Storage::putFileAs('public/uploads', $matric_marksheet, $newMatricMarkSheetName);
            $studentData['matric_photo'] = $newMatricMarkSheetName;
        }

        if (!empty($intermediate_marksheet)) {
            Storage::delete('public/uploads/' . $claim->intermediate_photo);
            $newIntermediateMarkSheetName = 'intermediate_marksheet-' . Carbon::now()->timestamp . '.' . $intermediate_marksheet->getClientOriginalExtension();
            if (!File::isDirectory(storage_path('app/public/uploads'))) {
                File::makeDirectory(storage_path('app/public/uploads'), 0755, true);
            }
            Storage::putFileAs('public/uploads', $intermediate_marksheet, $newIntermediateMarkSheetName);
            $studentData['intermediate_photo'] = $newIntermediateMarkSheetName;
        }

        if (!empty($bcone_marksheet)) {
            Storage::delete('public/uploads/' . $claim->bachelor_one_photo);
            $newBconeMarkSheetName = 'bachone_marksheet-' . Carbon::now()->timestamp . '.' . $bcone_marksheet->getClientOriginalExtension();
            if (!File::isDirectory(storage_path('app/public/uploads'))) {
                File::makeDirectory(storage_path('app/public/uploads'), 0755, true);
            }
            Storage::putFileAs('public/uploads', $bcone_marksheet, $newBconeMarkSheetName);
            $studentData['bachelor_one_photo'] = $newBconeMarkSheetName;
        }

        if (!empty($bctwo_marksheet)) {
            Storage::delete('public/uploads/' . $claim->bachelor_two_photo);
            $newBctwoMarkSheetName = 'bachtwo_marksheet-' . Carbon::now()->timestamp . '.' . $bctwo_marksheet->getClientOriginalExtension();
            if (!File::isDirectory(storage_path('app/public/uploads'))) {
                File::makeDirectory(storage_path('app/public/uploads'), 0755, true);
            }
            Storage::putFileAs('public/uploads', $bctwo_marksheet, $newBctwoMarkSheetName);
            $studentData['bachelor_two_photo'] = $newBctwoMarkSheetName;
        }

        if (!empty($bcthree_marksheet)) {
            Storage::delete('public/uploads/' . $claim->bachelor_three_photo);
            $newBcthreeMarkSheetName = 'bachthree_marksheet-' . Carbon::now()->timestamp . '.' . $bcthree_marksheet->getClientOriginalExtension();
            if (!File::isDirectory(storage_path('app/public/uploads'))) {
                File::makeDirectory(storage_path('app/public/uploads'), 0755, true);
            }
            Storage::putFileAs('public/uploads', $bcthree_marksheet, $newBcthreeMarkSheetName);
            $studentData['bachelor_three_photo'] = $newBcthreeMarkSheetName;
        }

        if (!empty($bcfour_marksheet)) {
            Storage::delete('public/uploads/' . $claim->bachelor_four_photo);
            $newBcfourMarkSheetName = 'bachfour_marksheet-' . Carbon::now()->timestamp . '.' . $bcfour_marksheet->getClientOriginalExtension();
            if (!File::isDirectory(storage_path('app/public/uploads'))) {
                File::makeDirectory(storage_path('app/public/uploads'), 0755, true);
            }
            Storage::putFileAs('public/uploads', $bcfour_marksheet, $newBcfourMarkSheetName);
            $studentData['bachelor_four_photo'] = $newBcfourMarkSheetName;
        }

        if (!empty($bcfive_marksheet)) {
            Storage::delete('public/uploads/' . $claim->bachelor_five_photo);
            $newBcfiveMarkSheetName = 'bachfive_marksheet-' . Carbon::now()->timestamp . '.' . $bcfive_marksheet->getClientOriginalExtension();
            if (!File::isDirectory(storage_path('app/public/uploads'))) {
                File::makeDirectory(storage_path('app/public/uploads'), 0755, true);
            }
            Storage::putFileAs('public/uploads', $bcfive_marksheet, $newBcfiveMarkSheetName);
            $studentData['bachelor_five_photo'] = $newBcfiveMarkSheetName;
        }

        if (!empty($beneficary_cnic)) {
            Storage::delete('public/uploads/' . $claim->beneficary_cnic_photo);
            $newBCNICName = 'beneficary_cnic-' . Carbon::now()->timestamp . '.' . $beneficary_cnic->getClientOriginalExtension();
            if (!File::isDirectory(storage_path('app/public/uploads'))) {
                File::makeDirectory(storage_path('app/public/uploads'), 0755, true);
            }
            Storage::putFileAs('public/uploads', $beneficary_cnic, $newBCNICName);
            $studentData['beneficary_cnic_photo'] = $newBCNICName;
        }

        if (!empty($parent_cnic)) {
            Storage::delete('public/uploads/' . $claim->parent_cnic_photo);
            $newPCNICName = 'parent_cnic-' . Carbon::now()->timestamp . '.' . $parent_cnic->getClientOriginalExtension();
            if (!File::isDirectory(storage_path('app/public/uploads'))) {
                File::makeDirectory(storage_path('app/public/uploads'), 0755, true);
            }
            Storage::putFileAs('public/uploads', $parent_cnic, $newPCNICName);
            $studentData['parent_cnic_photo'] = $newPCNICName;
        }

        $claim->update($studentData);

        if (!is_null(request()->installments) && is_array(request()->installments)) {
            $installment = [];
            foreach (\request()->installments as $key => $val) {
                $installment[] = [
                    'claim_id' => $claim->id,
                    'inst_number' => $val,
                    'year_of_receiving' => \request()->year_of_receiving[$key],
                    'received_yes' => \request()->received_yes[$key],
                    'if_no_reason' => \request()->if_no_reason[$key],
                    'amount_received' => \request()->amount_received[$key]
                ];
            }
            Installment::insert($installment);
            $claim->installments()->delete();
        }

        return response()->json(['msg' => 'Student claimed scholarship is updated.']);
    }

    public function detailClaim($claimId)
    {
        $claim = ClaimScholarShip::findOrFail($claimId);
        return view('cms.student.scholarship.claim.detail', compact('claim'));
    }

    public function changeStatus($claimId, $status)
    {
        $claim = ClaimScholarShip::findOrFail($claimId);
        $studentId = NULL;

        if ($status === 'approved') {
            $user = User::where('id', $claim->user_id)->first();
            $studentId = sprintf("%04d", (int)$claim->user_id);
            $user->update([
                'student_id' => $studentId,
            ]);
        }

        $claim->update([
            'student_id' => $studentId,
            'status' => $status
        ]);

        Notification::create([
            'user_id' => $claim->user_id,
            'type' => 'status-claim',
            'message' => " claim scholarship request has been {$status}."
        ]);

        try {
            event(new StatusChanged('claim', $claim));
        } catch (ConnectionException $exception) {
            return response()->json(['msg' => $exception->getMessage(), 'status' => $status]);
        };

        return response()->json(['msg' => 'Successfully status updated', 'status' => $status]);
    }

    public function generatePdf($claimId)
    {
        $claim = ClaimScholarShip::with(['getUser','installments'])->where('id', $claimId)->first();
        $pdfInput = PDF::loadView('student-claim-detail', compact('claim'));
//        $pdfInput->render();
        file_put_contents(public_path('files/student_claim_detail.pdf'), $pdfInput->output());

        $fileName = 'student_claim_detail_sample.pdf';
        $pdf = \Webklex\PDFMerger\Facades\PDFMergerFacade::init();
        $pdf->addPDF(public_path('files/student_claim_detail.pdf'), 'all');

        if (in_array('pdf', explode('.', $claim->matric_photo)) && file_exists(public_path('storage/uploads/' . $claim->matric_photo))) {
            $pdf->addPDF(public_path('storage/uploads/' . $claim->matric_photo), 'all');
        }
        if (in_array('pdf', explode('.', $claim->intermediate_photo)) && file_exists(public_path('storage/uploads/' . $claim->intermediate_photo))) {
            $pdf->addPDF(public_path('storage/uploads/' . $claim->intermediate_photo), 'all');
        }
        if (in_array('pdf', explode('.', $claim->bachelor_one_photo)) && file_exists(public_path('storage/uploads/' . $claim->bachelor_one_photo))) {
            $pdf->addPDF(public_path('storage/uploads/' . $claim->bachelor_one_photo), 'all');
        }
        if (in_array('pdf', explode('.', $claim->bachelor_two_photo)) && file_exists(public_path('storage/uploads/' . $claim->bachelor_two_photo))) {
            $pdf->addPDF(public_path('storage/uploads/' . $claim->bachelor_two_photo), 'all');
        }
        if (in_array('pdf', explode('.', $claim->bachelor_three_photo)) && file_exists(public_path('storage/uploads/' . $claim->bachelor_three_photo))) {
            $pdf->addPDF(public_path('storage/uploads/' . $claim->bachelor_three_photo), 'all');
        }
        if (in_array('pdf', explode('.', $claim->bachelor_four_photo)) && file_exists(public_path('storage/uploads/' . $claim->bachelor_four_photo))) {
            $pdf->addPDF(public_path('storage/uploads/' . $claim->bachelor_four_photo), 'all');
        }
        if (in_array('pdf', explode('.', $claim->bachelor_five_photo)) && file_exists(public_path('storage/uploads/' . $claim->bachelor_five_photo))) {
            $pdf->addPDF(public_path('storage/uploads/' . $claim->bachelor_five_photo), 'all');
        }
        if (in_array('pdf', explode('.', $claim->beneficary_cnic_photo)) && file_exists(public_path('storage/uploads/' . $claim->beneficary_cnic_photo))) {
            $pdf->addPDF(public_path('storage/uploads/' . $claim->beneficary_cnic_photo), 'all');
        }
        if (in_array('pdf', explode('.', $claim->parent_cnic_photo)) && file_exists(public_path('storage/uploads/' . $claim->parent_cnic_photo))) {
            $pdf->addPDF(public_path('storage/uploads/' . $claim->parent_cnic_photo), 'all');
        }

        $pdf->merge();
        $pdf->save(public_path($fileName));

        return response()->download(public_path($fileName));
    }

    public function import(Request $request)
    {
        $request->validate([
            'file' => 'required|file|mimes:csv,txt'
        ]);

        $file = $request->file('file');
        
        try {
            Excel::import(new ClaimForScholarShipImport(), $file);
        } catch (\Maatwebsite\Excel\Validators\ValidationException $e) {
        
            $failures = $e->failures();
        
            foreach ($failures as $failure) {
                $errors[] = $failure->errors()[0];
            }

            return redirect()->back()->withErrors($errors);
        }

        return redirect('admin/claim-for-scoloarships')->with('success', 'Import Successfully!');
    }
}
