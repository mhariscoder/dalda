<?php

namespace App\Http\Controllers\Website;

use App\Http\Controllers\Controller;
use App\Jobs\SendInquiryEmailJob;
use App\Models\CMSInquiry;
use App\Models\User;
use Illuminate\Support\Facades\Validator;
use Lunaweb\RecaptchaV3\Facades\RecaptchaV3;
use App\Jobs\SendConfirmationEmailJob;

class InquiryController extends Controller
{
    public function storeInquiry(){

        request()->validate([
            'name' => ['required','max:55'],
            'email' => ['required','email','max:100'],
            'phone' => ['sometimes', 'nullable', 'max:100'],
            'message' => ['required', 'max:800'],
            'g-recaptcha-response' => ['required','recaptchav3:contact,0.5']
        ],
    );
    // RecaptchaV3::shouldReceive('verify')
    // ->once()
    // ->andReturn(1.0);
    $score = RecaptchaV3::verify(request()->get('g-recaptcha-response'), 'contact');
    // dd($score);
        $data = CMSInquiry::create([
            'name' => request()->name,
            'email' => request()->email,
            'contact' => request()->phone,
            'message' => request()->message,
            'organization' => request()->organization,
        ]);
        $user = User::with('roles')
        // ->where('id',auth()->id())
        ->whereHas('roles',function ($q){
            $q->where('name','super-admin');
        })->first();
        dispatch(new SendConfirmationEmailJob(request()->email));
        dispatch(new SendInquiryEmailJob($user,$data->toArray()));
        return redirect()->back()->with('success', 'Successfully submitted your message.');
    }

    public function storeInquiryAlliance(){

        $validator = Validator::make(request()->all(), [
            'allianceName' => ['required','max:55'],
            'allianceOrganization' => ['required','max:200'],
            'allianceEmail' => ['required','email','max:100'],
            'alliancePhone' => ['sometimes', 'nullable', 'max:100'],
            'allianceMessage' => ['required', 'max:800'],
            'g-recaptcha-response' => ['required','recaptchav3:contact,0.5']
        ],
        [
            'allianceName.required' => 'The name field is required',
            'allianceOrganization.required' => 'The organization field is required',
            'allianceEmail.required' => 'The email field is required',
            'alliancePhone.required' => 'The phone field is required',
            'allianceMessage.required' => 'The message field is required',
        ]
    );

        if ($validator->fails()) {
            return redirect()->back()
                        ->withErrors($validator,'modalAllianceErrorBag')
                        ->withInput();
        }
        $data = CMSInquiry::create([
            'name' => request()->allianceName,
            'email' => request()->allianceEmail,
            'contact' => request()->alliancePhone,
            'message' => request()->allianceMessage,
            'organization' => request()->allianceOrganization,
        ]);
        $user = User::with('roles')
        // ->where('id',auth()->id())
        ->whereHas('roles',function ($q){
            $q->where('name','super-admin');
        })->first();
        dispatch(new SendConfirmationEmailJob(request()->allianceEmail));
        dispatch(new SendInquiryEmailJob($user,$data->toArray()));
        return redirect()->back()->with('successAlliance', 'Successfully submitted your message.');
    }

    public function storeInquiryModal(){

        $validator = Validator::make(request()->all(), [
            'name' => ['required','max:55'],
            'email' => ['required','email','max:100'],
            'phone' => ['sometimes', 'nullable', 'max:100'],
            'message' => ['required', 'max:800'],
            'g-recaptcha-response' => ['required','recaptchav3:contact,0.5']
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                        ->withErrors($validator,'modalErrorBag')
                        ->withInput();
        }
        $cmsInquiry = CMSInquiry::create([
            'name' => request()->name,
            'email' => request()->email,
            'contact' => request()->phone,
            'message' => request()->message,
            'student_id' => request()->id
        ]);
        $data = $cmsInquiry->toArray();
        if(!empty(request()->id)){
            $student = User::find(request()->id);
            $studentData = [
            'student_data' => 1,
            'student_fullname' => $student->full_name,
            'student_email' => $student->email,
            'student_contact' => $student->contact,
            'student_percentage' => $student->getTestResults->percentage
            ];
            $cmsData = $data;
            $data = array_merge($studentData,$cmsData);
        }
        $user = User::with('roles')
        // ->where('id',auth()->id())
        ->whereHas('roles',function ($q){
            $q->where('name','super-admin');
        })->first();

        dispatch(new SendConfirmationEmailJob(request()->email));
        dispatch(new SendInquiryEmailJob($user,$data));
        return redirect()->back()->with('successModal', 'Successfully submitted your message.');
    }
}
