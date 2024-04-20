<?php

namespace App\Http\Controllers\FrontEnd;

use App\Http\Controllers\Controller;
use App\Jobs\NewStudentEmailJob;
use App\Jobs\SendForgotPasswordEmailJob;
use App\Jobs\SendStudentForgotPasswordEmailJob;
use App\Models\User;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class AuthenticationController extends Controller
{
    public function index()
    {
        return view('frontend.authentication.login');
    }

    public function loginData()
    {
        $validator = Validator::make(request()->all(), [
            'email' => 'required|max:255',
            'password' => 'required|max:255',
            'g-recaptcha-response' => ['required','recaptchav3:login,0.5']

        ]);

        if ($validator->fails()) {
            return redirect()
                ->back()
                ->withErrors($validator)
                ->withInput();
        }

        if (!empty(Auth::validate(['email' => request()->email, 'password' => request()->password]))) {

            $rememberMe = !empty(request()->remember_me) ?: false;
            $user = User::where('email', request()->email)->first();

            if (!empty($user->is_block)) {
                return back()->with('error', 'You are temporary blocked. Kindly contact to your administrator.');
            }

            if (empty($user->is_verified)) {
                return back()->with('error', 'Please verify your account first.');
            }

            if (Auth::attempt(['email' => request()->email, 'password' => request()->password], $rememberMe)) {
                if ('student' == Str::lower(Arr::first($user->getRoleNames()))) {
                    return redirect('/student/dashboard');
                } else {
                    return redirect('/admin/dashboard');
                }
            }
        }
        return back()->with('error', 'Incorrect email or password.')->withInput(request()->except('password'));
    }


    public function signUpPopUp()
    {
        return view('frontend.authentication.signUpPopup');
    }

    public function registerUser()
    {
        return view('frontend.authentication.register');
    }

    public function registerUserData()
    {
        request()->validate([
            'first_name' => 'required|regex:/^[a-zA-Z]+(?:\s[a-zA-Z]+)*$/i|max:255',
            'last_name' => 'required|regex:/^[a-zA-Z]+(?:\s[a-zA-Z]+)*$/i|max:255',
            // 'father_name' => 'required|regex:/^[a-zA-Z]+(?:\s[a-zA-Z]+)*$/i|max:255',
            // 'mother_name' => 'required|regex:/^[a-zA-Z]+(?:\s[a-zA-Z]+)*$/i|max:255',
            'email' => 'required|max:255|unique:users,email',
            'password' => 'required|string|max:255|min:8|confirmed',
            'password_confirmation' => 'required|string|max:255|min:8',
            // 'cnic' => 'sometimes|nullable|digits_between:13,13',
            // 'contact' => 'sometimes|nullable|digits_between:11,13',
            'dob' => 'required|date',
            'postal_address' => 'required|string|max:150',
            'g-recaptcha-response' => ['required','recaptchav3:register,0.5']
        ], [
            'first_name.regex' => 'The first name should not contain numbers and special characters.',
            'last_name.regex' => 'The last name should not contain numbers and special characters.',
            // 'father_name.regex' => 'The first name should not contain numbers and special characters.',
            // 'mother_name.regex' => 'The last name should not contain numbers and special characters.'
        ], [
            'dob' => 'date of birth'
        ]);

        $user = User::create([
            'first_name' => request()->first_name,
            'last_name' => request()->last_name,
            // 'father_name' => request()->father_name,
            // 'mother_name' => request()->mother_name,
            'email' => request()->email,
            'password' => request()->password,
            // 'cnic' => request()->cnic,
            // 'contact' => request()->contact,
            'dob' => request()->dob,
            'postal_address' => request()->postal_address,
            // 'marital_status' => request()->marital_status,
            'verification_token' => Str::random('50'),
        ]);

        $user->assignRole('student');

        try {
            dispatch(new NewStudentEmailJob($user));
            session()->flash('success', 'Successfully account created. Verification link has been sent to your email address.');
        } catch (\Exception $e) {
            session()->flash('error', $e->getMessage());
        }

        return redirect('/login');
    }

    public function userVerification($verificationToken)
    {
        $user = User::where('verification_token', $verificationToken)->first();
        if (!empty($user)) {
            $user->update([
                'verification_token' => null,
                'is_verified' => 1,
            ]);
            Auth::loginUsingId($user->id);

            session()->flash('success', 'Your account is verified.');

            if ('student' == Str::lower(Arr::first($user->getRoleNames()))) {
                return redirect('/student/dashboard');
            } else {
                return redirect('/admin/dashboard');
            }
        } else {
            return redirect('/login')->with('error', 'Your account verification link is expired.');
        }
    }

    public function userPasswordVerification($verificationToken)
    {
        $user = User::where('verification_token', $verificationToken)->first();
        if (!empty($user)) {
            return view('frontend.authentication.user_verify', compact('verificationToken'));
        } else {
            if ('student' == Str::lower(Arr::first($user->getRoleNames()))) {
                return redirect('/student/dashboard');
            } else {
                return redirect('/admin/dashboard');
            }
        }
    }

    public function userPasswordVerificationData($verificationToken)
    {

        $validator = Validator::make(request()->all(), [
            'password' => 'required|min:6|max:255|confirmed',
            'password_confirmation' => 'required|min:6|max:255',
        ]);

        if ($validator->fails()) {
            return redirect()
                ->back()
                ->withErrors($validator)
                ->withInput();
        }

        $user = User::where('verification_token', $verificationToken)->first();

        if (!empty($user)) {

            $user->update([
                'verification_token' => null,
                'is_verified' => 1,
                'password' => request()->password
            ]);

            Auth::loginUsingId($user->id);

            if ('student' == Str::lower(Arr::first($user->getRoleNames()))) {
                return redirect('/student/dashboard');
            } else {
                return redirect('/admin/dashboard');
            }
        }

        abort(404);
    }

    public function forgotPassword()
    {
        return view('frontend.authentication.forgot_password');
    }

    public function forgotPasswordData()
    {

        $user = User::where('email', request()->email)->first();

        if (!empty($user)) {

            if (!empty($user->is_block)) {
                return back()->with('error', 'You are temporary blocked. Kindly contact to your administrator.');
            }

            if (empty($user->is_verified)) {
                return back()->with('error', 'Please verify your account first.');
            }

            $user->update([
                'verification_token' => Str::random('50')
            ]);

            if ('student' == Str::lower(Arr::first($user->getRoleNames()))) {
                dispatch(new SendStudentForgotPasswordEmailJob($user));
            } else {
                dispatch(new SendForgotPasswordEmailJob($user));
            }

            return back()->with('success', "Please check your email for reset password link.");
        }

        return back()->with('error', "Email doesn't exist.");
    }

    public function logout()
    {
        Auth::logout();
        return redirect('/login');
    }
}
