<?php

namespace App\Http\Controllers\FrontEnd\Student;

use App\Http\Controllers\Controller;
use App\Jobs\FormSubmittedJob;
use App\Models\ApplyScholarShip;
use App\Models\ClaimScholarShip;
use App\Models\Installment;
use App\Models\Notification;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Intervention\Image\Facades\Image;
use Predis\Connection\ConnectionException;

class ClaimScholarShipController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:student-claim-scholarship-list|student-claim-scholarship-create', ['only' => ['index', 'addStudentClaimData']]);
        $this->middleware('permission:student-claim-scholarship-create', ['only' => ['addStudentClaim', 'addStudentClaimData']]);
    }

    public function index()
    {
        $claims = ClaimScholarShip::where('user_id', Auth::user()->id)->get();
        if (session()->has('notification')) {
            $notify = session()->get('notification');
            $notify->update([
                'is_read' => 1
            ]);
        }
        return view('frontend.student.scholarship.claim.index', compact('claims'));
    }

    public function addStudentClaim()
    {
        $student = User::where('id', Auth::id())->first()->student_id;
        if (empty($student)) {
            return redirect('/student/claim-for-scholarship')->with('error', "You don't have right permission.");
        }
        return view('frontend.student.scholarship.claim.add', compact('student'));
    }

    public function addStudentClaimData()
    {
        $findClaimForm = ClaimScholarShip::query()->where('student_id', auth()->user()->student_id)->first();
        if ($findClaimForm) return response()->json(['error' => "Student has already claimed for the scholorship!"], 422);

        $studentData = array();
        $user = Auth::user();
        if (empty($user->student_id)) {
            return back()->withErrors(['error' => 'Please Contact Administrator for your student id'])->withInput();
        }

        $validator = Validator::make(request()->all(), [
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
            'beneficary_bank_address' => 'required|max:150',
            'beneficary_cnic' => 'required|digits_between:13,15',
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

        $studentData['user_id'] = $user->id;
        $studentData['student_id'] = $user->student_id;
        $studentData['fullname'] = $user->full_name;
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
        $studentData['email_address'] = $user->email;
        $studentData['goals'] = request()->goals;
        $studentData['suggestion'] = request()->suggestion;
        $studentData['your_contribution'] = request()->your_contribution;
        $studentData['international_scolarship'] = request()->international_scolarship;
        $studentData['standarized_test'] = request()->standarized_test;
        $studentData['english_ability_test'] = request()->english_ability_test;
        $studentData['share_any'] = request()->share_any;
        $studentData['intermediate_repeated'] = request()->intermediate_repeated;
        $studentData['status'] = 'pending';

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
            foreach (\request()->installments as $key => $val)
            {
                $installment[] = [
                    'claim_id' => $claim->id,
                    'inst_number' => $val,
                    'year_of_receiving' => \request()->year_of_receiving[$key],
                    'received_yes' => \request()->received_yes[$key],
                    'if_no_reason'  => \request()->if_no_reason[$key],
                    'amount_received' => \request()->amount_received[$key]
                ];
            }
            Installment::insert($installment);
        }

        $admin = User::role('super-admin')->first()->id;

        Notification::create([
            'user_id' => Auth::id(),
            'type' => 'claim',
            'message' => ' is claimed for scholarship.'
        ]);

        try {
            event(new \App\Events\FormSubmitted('claim', $admin));
        } catch (ConnectionException $exception) {
            return back()->with('success', 'You have successfully claimed, but ' . $exception->getMessage());
        };

        return response()->json(['msg' => 'You have successfully claimed for scholarship.']);
    }

    public function detailStudentClaim($claimId)
    {
        $claim = ClaimScholarShip::with('installments')->findOrFail($claimId);
        abort_if(auth()->id() != $claim->user_id,403);
        return view('frontend.student.scholarship.claim.detail', compact('claim'));
    }
}
