<?php

namespace App\Http\Controllers\Cms;

use App\Http\Controllers\Controller;
use App\Rules\EmailFormat;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;
use Intervention\Image\Facades\Image;

class ProfileController extends Controller
{
    public function index()
    {
        $profile = Auth::user();
        return view('cms.profile', compact('profile'));
    }

    public function updateProfile()
    {
        $profile = Auth::user();
        request()->validate([
            'first_name' => 'required|regex:/^[a-zA-Z]+(?:\s[a-zA-Z]+)*$/i|max:255',
            'last_name' => 'required|regex:/^[a-zA-Z]+(?:\s[a-zA-Z]+)*$/i|max:255',
            'email' => ['required','email','unique:users,email,'.$profile->id.',id,deleted_at,NULL','max:255', new EmailFormat()],
            'cnic' => 'sometimes|nullable|digits_between:13,15',
            'contact' => 'sometimes|nullable|digits_between:11,13',
            'profile_picture' => 'sometimes|nullable|mimes:jpeg,jpg,png|max:10240',
            'profile_detail' => 'sometimes|nullable|string|max:250',
            'gender' => 'sometimes|nullable|in:male,female,other|max:10',
            'dob' => 'sometimes|nullable|date',
        ], [
            'first_name.regex' => 'The first name should not contain numbers and special characters.',
            'last_name.regex' => 'The last name should not contain numbers and special characters.'
        ], [
            'dob' => 'date of birth'
        ]);

        if (request()->hasFile('profile_picture')) {
            $img = Image::make(request()->file('profile_picture'));
            $extension = request()->file('profile_picture')->extension();
            if($extension === "jfif"){
                $extension = "jpg";
            }
            $newFileName = Str::random(10) . Carbon::now()->timestamp . '.' . $extension;
            $purposePath = public_path() . '/assets/images/user_profile/';
            $destination = public_path() . '/assets/images/user_profile/' . $newFileName;

            if (File::isDirectory($purposePath)) {
                File::makeDirectory($purposePath, 0766, true, true);
            }

            $check = $img->save($destination, 70);

            if ($check) {
                $profile->update([
                    'profile_picture' => $newFileName
                ]);
            } else {
                File::delete($destination);
                return back()->withErrors(['error', 'File have not been saved in database!'])->withInput();
            }
        }

        $profile->update([
            'first_name' => request()->first_name,
            'last_name' => request()->last_name,
            'email' => request()->email,
            'cnic' => str_replace('-','',request()->cnic),
            'contact' => str_replace('-','',request()->contact),
            'profile_detail' => request()->profile_detail,
            'gender' => request()->gender,
            'dob' => request()->dob,
            'updated_by' => Auth::id()
        ]);

        return back()->with('success', 'Your profile has been successfully updated.');
    }
}
