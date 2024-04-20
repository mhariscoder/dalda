<?php

namespace App\Http\Controllers\Cms\Website;

use App\Http\Controllers\Controller;
use App\Models\CMSEducation;
use App\Models\CMSImage;
use App\Models\CMSVideo;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;
use Intervention\Image\Facades\Image;

class CMSEducationController extends Controller
{
    public function index()
    {
        $institutes = CMSEducation::latest()->get();
        return view('cms.website.education.index', compact('institutes'));
    }

    public function addList()
    {
        return view('cms.website.education.add');
    }

    public function addListData()
    {
        request()->validate([
            'institute_name' => 'required|max:55|unique:cms_education,institute_name,NULL,id,web_url,' . request('web_url') . ',deleted_at,NULL',
            'web_url' => 'required|string|max:55',
            'description' => 'sometimes|nullable|max:400'
        ]);

        CMSEducation::create([
            'institute_name' => request()->institute_name,
            'web_url' => request()->web_url,
            'description' => request()->description,
        ]);
        return redirect('/admin/education-list')->with('success', 'Successfully added!');
    }

    public function updateList($educationId)
    {
        $institute = CMSEducation::where('id', $educationId)->first();

        return view('cms.website.education.update', compact('institute'));
    }

    public function updateListData($educationId)
    {
        $institute = CMSEducation::where('id', $educationId)->first();
        request()->validate([
            'banner_heading' => 'required',
            'section1_heading' => 'required',
            'section1_description' => 'required',
            'section2_description' => 'required',
            'section3_heading' => 'required',
            'section3_description' => 'required',
            'section4_heading' => 'required',
            'section4_description' => 'required',
            'section5_content' => 'required',
            'section6_heading' => 'required',
            'section6_description' => 'required',
            'section7_heading' => 'required',
            'section7_description' => 'required',
        ]);

        $bannerFileName = $institute->banner;
        $section2imageFileName = $institute->section2_image;
        $section3ImageFileName = $institute->section3_image;
        $section4ImageFileName = $institute->section4_image;
        $section7ImageFileName = $institute->section7_image;

        if (!empty(request()->file('banner'))) {
            request()->validate([
                'banner' => ['required', 'image', 'mimes:jpeg,jpg,png,svg', 'max:10480'],
            ]);
            $oldImagePath = getAbsolutePath() . '/assets/website/images/pages/education/' . $institute->banner;
            $path = getAbsolutePath() . '/assets/website/images/pages/education';
            if (!File::isDirectory($path)) {
                File::makeDirectory($path, 0777, true, true);
            }
            $img = Image::make(request()->file('banner'));
            $extension = request()->file('banner')->extension();
            $random = Str::random(30);
            $dt = Carbon::now()->timestamp;
            $bannerFileName = $random . '-' . $dt . '.' . $extension;
            $img->save($path . '/' . $bannerFileName);
            if (file_exists($oldImagePath)) {
                File::delete($oldImagePath);
            }
        }

        if (!empty(request()->file('section2_image'))) {
            request()->validate([
                'section2_image' => ['required', 'image', 'mimes:jpeg,jpg,png,svg', 'max:10480'],
            ]);
            $oldImagePath = getAbsolutePath() . '/assets/website/images/pages/education/' . $institute->section2_image;
            $path = getAbsolutePath() . '/assets/website/images/pages/education';
            if (!File::isDirectory($path)) {
                File::makeDirectory($path, 0777, true, true);
            }
            $img = Image::make(request()->file('section2_image'));
            $extension = request()->file('section2_image')->extension();
            $random = Str::random(30);
            $dt = Carbon::now()->timestamp;
            $section2imageFileName = $random . '-' . $dt . '.' . $extension;
            $img->save($path . '/' . $section2imageFileName);
            if (file_exists($oldImagePath)) {
                File::delete($oldImagePath);
            }
        }

        if (!empty(request()->file('section3_image'))) {
            request()->validate([
                'section3_image' => ['required', 'image', 'mimes:jpeg,jpg,png,svg', 'max:10480'],
            ]);
            $oldImagePath = getAbsolutePath() . '/assets/website/images/pages/education/' . $institute->section3_image;
            $path = getAbsolutePath() . '/assets/website/images/pages/education';
            if (!File::isDirectory($path)) {
                File::makeDirectory($path, 0777, true, true);
            }
            $img = Image::make(request()->file('section3_image'));
            $extension = request()->file('section3_image')->extension();
            $random = Str::random(30);
            $dt = Carbon::now()->timestamp;
            $section3ImageFileName = $random . '-' . $dt . '.' . $extension;
            $img->save($path . '/' . $section3ImageFileName);
            if (file_exists($oldImagePath)) {
                File::delete($oldImagePath);
            }
        }

        if (!empty(request()->file('section4_image'))) {
            request()->validate([
                'section4_image' => ['required', 'image', 'mimes:jpeg,jpg,png,svg', 'max:10480'],
            ]);
            $oldImagePath = getAbsolutePath() . '/assets/website/images/pages/education/' . $institute->section4_image;
            $path = getAbsolutePath() . '/assets/website/images/pages/education';
            if (!File::isDirectory($path)) {
                File::makeDirectory($path, 0777, true, true);
            }
            $img = Image::make(request()->file('section4_image'));
            $extension = request()->file('section4_image')->extension();
            $random = Str::random(30);
            $dt = Carbon::now()->timestamp;
            $section4ImageFileName = $random . '-' . $dt . '.' . $extension;
            $img->save($path . '/' . $section4ImageFileName);
            if (file_exists($oldImagePath)) {
                File::delete($oldImagePath);
            }
        }

        if (!empty(request()->file('section7_image'))) {
            request()->validate([
                'section7_image' => ['required', 'image', 'mimes:jpeg,jpg,png,svg', 'max:10480'],
            ]);
            $oldImagePath = getAbsolutePath() . '/assets/website/images/pages/education/' . $institute->section7_image;
            $path = getAbsolutePath() . '/assets/website/images/pages/education';
            if (!File::isDirectory($path)) {
                File::makeDirectory($path, 0777, true, true);
            }
            $img = Image::make(request()->file('section7_image'));
            $extension = request()->file('section7_image')->extension();
            $random = Str::random(30);
            $dt = Carbon::now()->timestamp;
            $section7ImageFileName = $random . '-' . $dt . '.' . $extension;
            $img->save($path . '/' . $section7ImageFileName);
            if (file_exists($oldImagePath)) {
                File::delete($oldImagePath);
            }
        }

        $institute->update([
            'banner' => $bannerFileName,
            'banner_heading' => request()->banner_heading,
            'section1_heading' => request()->section1_heading,
            'section1_description' => request()->section1_description,
            'section2_description' => request()->section2_description,
            'section2_image' => $section2imageFileName,
            'section3_heading' => request()->section3_heading,
            'section3_description' => request()->section3_description,
            'section3_image' => $section3ImageFileName,
            'section4_heading' => request()->section4_heading,
            'section4_description' => request()->section4_description,
            'section4_image' => $section4ImageFileName,
            'section5_content' => request()->section5_content,
            'section6_heading' => request()->section6_heading,
            'section6_description' => request()->section6_description,
            'section7_heading' => request()->section7_heading,
            'section7_description' => request()->section7_description,
            'section7_image' => $section7ImageFileName,
        ]);
        return redirect()->back()->with('success', 'Successfully updated!');
    }

    public function deleteList($educationId)
    {
        $msg = "Some thing went wrong!";
        $code = 400;
        $updateEducation = CMSEducation::find($educationId);
        $galleryImage = CMSImage::where('imageable_id', $educationId)->first();
        $galleryVideo = CMSVideo::where('videoable_id', $educationId)->first();
        $check = true;
        if (!empty($galleryImage) || !empty($galleryVideo)) {
            $msg = "Please remove records from gallery first!";
            $check = false;
        }

        if (!empty($updateEducation) && $check) {
            $updateEducation->delete();
            $msg = "Successfully Delete record!";
            $code = 200;
        }
        return response()->json(['msg' => $msg], $code);
    }
}
