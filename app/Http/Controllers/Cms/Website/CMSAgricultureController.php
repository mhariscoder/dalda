<?php

namespace App\Http\Controllers\Cms\Website;

use App\Http\Controllers\Controller;
use App\Models\CMSAgriculture;
use App\Models\CMSImage;
use App\Models\CMSVideo;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Carbon;

use Intervention\Image\Facades\Image;

use Illuminate\Http\Request;

class CMSAgricultureController extends Controller
{
    public function index()
    {
        $agricultures = CMSAgriculture::latest()->get();
        return view('cms.website.agriculture.index', compact('agricultures'));
    }

    public function addList()
    {
        return view('cms.website.agriculture.add');
    }

    public function addListData()
    {
        request()->validate([
            'university_name' => 'required|max:55|unique:cms_agriculture,university_name,NULL,id,web_url,' . request('web_url') . ',deleted_at,NULL',
            'web_url' => 'required|string|max:55',
            'description' => 'sometimes|nullable|max:400'
        ]);

        CMSAgriculture::create([
            'university_name' => request()->university_name,
            'web_url' => request()->web_url,
            'description' => request()->description,
        ]);
        return redirect('/admin/agriculture-list')->with('success', 'Successfully added!');
    }

    public function updateList($agricultureId)
    {
        $agriculture = CMSAgriculture::where('id', $agricultureId)->first();
        return view('cms.website.agriculture.update', compact('agriculture'));
    }

    public function updateListData($agricultureId)
    {
        $agriculture = CMSAgriculture::findOrFail($agricultureId);


        request()->validate([
            // 'heading' => 'required|max:55|unique:cms_agriculture,university_name,' . $agricultureId . ',id,web_url,' . request('web_url') . ',deleted_at,NULL',
            'heading' => 'required|max:55',
            'description' => 'required',
            'section1_content1' => 'required',
            'section1_content2' => 'required',
            'section2_content' => 'required',
            'section3_heading' => 'required',
            'section3_content' => 'required',
            'section4_content' => 'required',
            'banner_heading' => 'required',

        ]);


        $bannerName = $agriculture->banner;
        $section1Img1 = $agriculture->section1_image1;
        $section1Img2 = $agriculture->section1_image2;
        $section2Img = $agriculture->section2_image;
        $section4Img = $agriculture->section4_image;



        // s1i1
        if (!empty(request()->file('section1_image1'))) {
            request()->validate([
                'section1_image1' => ['nullable', 'image', 'mimes:jpeg,jpg,png', 'max:10480'],
            ]);
            $oldImagePath = getAbsolutePath() . '/assets/website/images/pages/agriculture/' . $agriculture->section1_image1;
            $path = getAbsolutePath() . '/assets/website/images/pages/agriculture';
            if (!File::isDirectory($path)) {
                File::makeDirectory($path, 0777, true, true);
            }
            $img = Image::make(request()->file('section1_image1'));
            $extension = request()->file('section1_image1')->extension();
            $random = Str::random(30);
            $dt = Carbon::now()->timestamp;
            $section1Img1 = $random . '-' . $dt . '.' . $extension;
            $img->save($path . '/' . $section1Img1);
            if (file_exists($oldImagePath)) {
                File::delete($oldImagePath);
            }
        }

        // s1i2
        if (!empty(request()->file('section1_image2'))) {
            request()->validate([
                'section1_image2' => ['required', 'image', 'mimes:jpeg,jpg,png', 'max:10480'],
            ]);
            $oldImagePath = getAbsolutePath() . '/assets/website/images/pages/agriculture/' . $agriculture->section1_image2;
            $path = getAbsolutePath() . '/assets/website/images/pages/agriculture';
            if (!File::isDirectory($path)) {
                File::makeDirectory($path, 0777, true, true);
            }
            $img = Image::make(request()->file('section1_image2'));
            $extension = request()->file('section1_image2')->extension();
            $random = Str::random(30);
            $dt = Carbon::now()->timestamp;
            $section1Img2 = $random . '-' . $dt . '.' . $extension;
            $img->save($path . '/' . $section1Img2);
            if (file_exists($oldImagePath)) {
                File::delete($oldImagePath);
            }
        }


        // s2image
        if (!empty(request()->file('section2_image'))) {
            request()->validate([
                'section2_image' => ['required', 'image', 'mimes:jpeg,jpg,png', 'max:10480'],
            ]);
            $oldImagePath = getAbsolutePath() . '/assets/website/images/pages/agriculture/' . $agriculture->section2_image;
            $path = getAbsolutePath() . '/assets/website/images/pages/agriculture';
            if (!File::isDirectory($path)) {
                File::makeDirectory($path, 0777, true, true);
            }
            $img = Image::make(request()->file('section2_image'));
            $extension = request()->file('section2_image')->extension();
            $random = Str::random(30);
            $dt = Carbon::now()->timestamp;
            $section2Img = $random . '-' . $dt . '.' . $extension;
            $img->save($path . '/' . $section2Img);
            if (file_exists($oldImagePath)) {
                File::delete($oldImagePath);
            }
        }

        // s3image
        if (!empty(request()->file('section4_image'))) {
            request()->validate([
                'section4_image' => ['required', 'image', 'mimes:jpeg,jpg,png', 'max:10480'],
            ]);
            $oldImagePath = getAbsolutePath() . '/assets/website/images/pages/agriculture/' . $agriculture->section4_image;
            $path = getAbsolutePath() . '/assets/website/images/pages/agriculture';
            if (!File::isDirectory($path)) {
                File::makeDirectory($path, 0777, true, true);
            }
            $img = Image::make(request()->file('section4_image'));
            $extension = request()->file('section4_image')->extension();
            $random = Str::random(30);
            $dt = Carbon::now()->timestamp;
            $section4Img = $random . '-' . $dt . '.' . $extension;
            $img->save($path . '/' . $section4Img);
            if (file_exists($oldImagePath)) {
                File::delete($oldImagePath);
            }
        }

        if (!empty(request()->file('banner'))) {
            request()->validate([
                'banner' => ['required', 'image', 'mimes:jpeg,jpg,png', 'max:10480'],
            ]);
            $oldImagePath = getAbsolutePath() . '/assets/website/images/pages/agriculture/' . $agriculture->banner;
            $path = getAbsolutePath() . '/assets/website/images/pages/agriculture';
            if (!File::isDirectory($path)) {
                File::makeDirectory($path, 0777, true, true);
            }
            $img = Image::make(request()->file('banner'));
            $extension = request()->file('banner')->extension();
            $random = Str::random(30);
            $dt = Carbon::now()->timestamp;
            $bannerName = $random . '-' . $dt . '.' . $extension;
            $img->save($path . '/' . $bannerName);
            if (file_exists($oldImagePath)) {
                File::delete($oldImagePath);
            }
        }





        $agriculture->update([
            'heading' => request()->heading,
            'description' => request()->description,
            'section1_image1' => $section1Img1,
            'section1_content1' => request()->section1_content1,
            'section1_image2' => $section1Img2,
            'section1_content2' => request()->section1_content2,
            'section2_image' => $section2Img,
            'section2_content' => request()->section2_content,
            'section3_heading' => request()->section3_heading,
            'section3_content' => request()->section3_content,
            'section4_image' => $section4Img,
            'section4_content' => request()->section4_content,
            'banner' => $bannerName,
            'banner_heading' => request()->banner_heading


        ]);
        return response()->json(['msg' => 'Successfully updated.']);
    }

    public function deleteList($agricultureId)
    {
        $msg = "Some thing went wrong!";
        $code = 400;
        $updateAgriculture = CMSAgriculture::find($agricultureId);
        $galleryImage = CMSImage::where('imageable_id', $agricultureId)->first();
        $galleryVideo = CMSVideo::where('videoable_id', $agricultureId)->first();
        $check = true;
        if (!empty($galleryImage) || !empty($galleryVideo)) {
            $msg = "Please remove records from gallery first!";
            $check = false;
        }

        if (!empty($updateAgriculture) && $check) {
            $updateAgriculture->delete();
            $msg = "Successfully Delete record!";
            $code = 200;
        }
        return response()->json(['msg' => $msg], $code);
    }
}
