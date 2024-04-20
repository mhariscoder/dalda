<?php

namespace App\Http\Controllers\Cms\Website;

use App\Http\Controllers\Controller;
use App\Models\CMSAbout;
use App\Models\CMSContact;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use Intervention\Image\Facades\Image;

class CMSContactController extends Controller
{
    public function index()
    {
        $resultSet = CMSContact::all();
        return view('cms.website.contact.index', compact('resultSet'));
    }

    public function addContact()
    {
        return view('cms.website.contact.add');
    }

    public function addContactData()
    {
        request()->validate([
            'title' => ['required','max:55','unique:cms_contact,title'],
            'office_no' => ['required','max:15'],
            'email' => ['required','email','max:55','unique:cms_contact,email'],
            'address' => ['required','string','max:1000'],
            'banner' => ['required', 'image', 'mimes:jpeg,jpg,png,svg', 'max:10480']
        ]);

        if (request()->hasFile('banner')) {
            $img = Image::make(request()->file('banner'));
            $extension = request()->file('banner')->extension();
            $random = Str::random(30);
            $dt = Carbon::now()->timestamp;
            $newFileName = $random . '-' . $dt . '.' . $extension;
            $purposePath = getAbsolutePath() . '/assets/website/images/pages/contact';
            $destination = getAbsolutePath() . '/assets/website/images/pages/contact/' . $newFileName;

            if (!File::isDirectory($purposePath)) {
                File::makeDirectory($purposePath, 0777, true, true);
            }

            $img->save($destination);
            CMSContact::create([
                'title' => request()->title,
                'banner' => $newFileName,
                'office_no' => request()->office_no,
                'email' => request()->email,
                'address' => request()->address,
            ]);
        }
        return response()->json(['msg' => 'Successfully added.']);
    }

    public function updateContact($cmsContactId)
    {
        $updateContact = CMSContact::findOrFail($cmsContactId);
        return view('cms.website.contact.update', compact('updateContact'));
    }

    public function updateContactData($cmsContactId)
    {
        $updateContact = CMSContact::findOrFail($cmsContactId);
        request()->validate([
            'title' => ['required','max:55'],
            'sub_heading' => ['required'],
            'banner_heading'=>['required'],
            'office_no' => ['required','max:15'],
            'email' => ['required','email','max:55'],
            'address' => ['required','string','max:1000']
        ]);

        $newFileName = $updateContact->banner;

        if (!empty(request()->file('banner'))) {
            request()->validate([
                'banner' => ['required', 'image', 'mimes:jpeg,jpg,png,svg', 'max:10480'],
            ]);
            $oldImagePath = getAbsolutePath().'/assets/website/images/pages/contact/'.$updateContact->banner;
            $path = getAbsolutePath().'/assets/website/images/pages/contact';
            if (!File::isDirectory($path)) {
                File::makeDirectory($path, 0777, true, true);
            }
            $img = Image::make(request()->file('banner'));
            $extension = request()->file('banner')->extension();
            $random = Str::random(30);
            $dt = Carbon::now()->timestamp;
            $newFileName = $random . '-' . $dt . '.' . $extension;
            $img->save($path.'/'.$newFileName);
            if(file_exists($oldImagePath)){
                File::delete($oldImagePath);
            }
        }
        $updateContact->update([
            'title' => request()->title,
            'sub_heading'=>request()->sub_heading,
            'banner' => $newFileName,
            'banner_heading'=>request()->banner_heading,
            'office_no' => request()->office_no,
            'email' => request()->email,
            'address' => request()->address,
        ]);
        return response()->json(['msg' => 'Successfully updated.']);
    }

    public function deleteContact($cmsContactId)
    {
        $msg = "Some thing went wrong!";
        $code = 400;
        $records = CMSContact::all();
        $updateContact = $records->find($cmsContactId);

        if (count($records) > 1) {
            if (!empty($updateContact)) {
                // unlink( '/assets/website/images/pages/contact/' . $updateContact->banner);
                $updateContact->delete();
                $msg = "Successfully Delete record!";
                $code = 200;
            }
        } else {
            $msg = "You have only 1 records Add more records to remove them!";
            $code = 302;
        }
        return response()->json(['msg' => $msg], $code);
    }
}
