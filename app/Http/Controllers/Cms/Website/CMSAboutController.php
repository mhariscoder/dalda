<?php

namespace App\Http\Controllers\Cms\Website;

use App\Http\Controllers\Controller;
use App\Models\CMSAbout;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;
use Intervention\Image\Facades\Image;

class CMSAboutController extends Controller
{
    public function index()
    {
        $resultSet = CMSAbout::all();
        return view('cms.website.about.index', compact('resultSet'));
    }

    public function addAbout()
    {
        return view('cms.website.about.add');
    }

    public function addAboutData()
    {
        request()->validate([
            'title' => ['required','max:55','unique:cms_about,title'],
            'banner' => ['required', 'image', 'mimes:jpeg,jpg,png,svg', 'max:10480'],
            'short_description' => ['required','max:350'],
            'description' => ['required','max:1000']
        ]);

        if (request()->hasFile('banner')) {
            $img = Image::make(request()->file('banner'));
            $extension = request()->file('banner')->extension();
            $random = Str::random(30);
            $dt = Carbon::now()->timestamp;
            $newFileName = $random . '-' . $dt . '.' . $extension;
            $purposePath = getAbsolutePath() . '/assets/website/images/pages/about';
            $destination = getAbsolutePath() . '/assets/website/images/pages/about/' . $newFileName;

            if (!File::isDirectory($purposePath)) {
                File::makeDirectory($purposePath, 0777, true, true);
            }

            $img->save($destination);
            CMSAbout::create([
                'title' => request()->title,
                'banner' => $newFileName,
                'short_description' => request()->short_description,
                'description' => request()->description,
            ]);
        }
        return response()->json(['msg' => 'Successfully added.']);
    }

    public function updateAbout($cmsAboutId)
    {
        $updateAbout = CMSAbout::findOrFail($cmsAboutId);
        return view('cms.website.about.update', compact('updateAbout'));
    }

    public function updateAboutData($cmsAboutId)
    {
        $updateAbout = CMSAbout::findOrFail($cmsAboutId);
        request()->validate([
            'banner_heading' => ['required'],
            'section1_heading' => ['required'],
            'section1_description' => ['required'],
            'section2_content1' => ['required'],
            'section2_content2' => ['required'],
            'section3_heading' => ['required'],
            'section3_description' => ['required'],
            'section4_heading1' => ['required'],
            'section4_description1' => ['required'],
            'section4_heading2' => ['required'],
            'section4_description2' => ['required'],
        ]);
        $bannerFileName = $updateAbout->banner;
        $section2image1FileName = $updateAbout->section2_image1;
        $section2Image2FileName = $updateAbout->section2_image2;
        $section3ImageFileName = $updateAbout->section3_image;
        $section4Image1FileName = $updateAbout->section4_image1;
        $section4Image2FileName = $updateAbout->section4_image2;

        if (!empty(request()->file('banner'))) {
            request()->validate([
                'banner' => ['required', 'image', 'mimes:jpeg,jpg,png,svg', 'max:10480'],
            ]);
            $oldImagePath = getAbsolutePath().'/assets/website/images/pages/about/'.$updateAbout->banner;
            $path = getAbsolutePath().'/assets/website/images/pages/about';
            if (!File::isDirectory($path)) {
                File::makeDirectory($path, 0777, true, true);
            }
            $img = Image::make(request()->file('banner'));
            $extension = request()->file('banner')->extension();
            $random = Str::random(30);
            $dt = Carbon::now()->timestamp;
            $bannerFileName = $random . '-' . $dt . '.' . $extension;
            $img->save($path.'/'.$bannerFileName);
            if(file_exists($oldImagePath)){
                File::delete($oldImagePath);
            }
        }
        if (!empty(request()->file('section2_image1'))) {
            request()->validate([
                'section2_image1' => ['required', 'image', 'mimes:jpeg,jpg,png,svg', 'max:10480'],
            ]);
            $oldImagePath = getAbsolutePath().'/assets/website/images/pages/about/'.$updateAbout->section2_image1;
            $path = getAbsolutePath().'/assets/website/images/pages/about';
            if (!File::isDirectory($path)) {
                File::makeDirectory($path, 0777, true, true);
            }
            $img = Image::make(request()->file('section2_image1'));
            $extension = request()->file('section2_image1')->extension();
            $random = Str::random(30);
            $dt = Carbon::now()->timestamp;
            $section2image1FileName = $random . '-' . $dt . '.' . $extension;
            $img->save($path.'/'.$section2image1FileName);
            if(file_exists($oldImagePath)){
                File::delete($oldImagePath);
            }
        }
        if (!empty(request()->file('section2_image2'))) {
            request()->validate([
                'section2_image2' => ['required', 'image', 'mimes:jpeg,jpg,png,svg', 'max:10480'],
            ]);
            $oldImagePath = getAbsolutePath().'/assets/website/images/pages/about/'.$updateAbout->section2_image2;
            $path = getAbsolutePath().'/assets/website/images/pages/about';
            if (!File::isDirectory($path)) {
                File::makeDirectory($path, 0777, true, true);
            }
            $img = Image::make(request()->file('section2_image2'));
            $extension = request()->file('section2_image2')->extension();
            $random = Str::random(30);
            $dt = Carbon::now()->timestamp;
            $section2Image2FileName = $random . '-' . $dt . '.' . $extension;
            $img->save($path.'/'.$section2Image2FileName);
            if(file_exists($oldImagePath)){
                File::delete($oldImagePath);
            }
        }
        if (!empty(request()->file('section3_image'))) {
            request()->validate([
                'section3_image' => ['required', 'image', 'mimes:jpeg,jpg,png,svg', 'max:10480'],
            ]);
            $oldImagePath = getAbsolutePath().'/assets/website/images/pages/about/'.$updateAbout->section3_image;
            $path = getAbsolutePath().'/assets/website/images/pages/about';
            if (!File::isDirectory($path)) {
                File::makeDirectory($path, 0777, true, true);
            }
            $img = Image::make(request()->file('section3_image'));
            $extension = request()->file('section3_image')->extension();
            $random = Str::random(30);
            $dt = Carbon::now()->timestamp;
            $section3ImageFileName = $random . '-' . $dt . '.' . $extension;
            $img->save($path.'/'.$section3ImageFileName);
            if(file_exists($oldImagePath)){
                File::delete($oldImagePath);
            }
        }
        if (!empty(request()->file('section4_image1'))) {
            request()->validate([
                'section4_image1' => ['required', 'image', 'mimes:jpeg,jpg,png,svg', 'max:10480'],
            ]);
            $oldImagePath = getAbsolutePath().'/assets/website/images/pages/about/'.$updateAbout->section4_image1;
            $path = getAbsolutePath().'/assets/website/images/pages/about';
            if (!File::isDirectory($path)) {
                File::makeDirectory($path, 0777, true, true);
            }
            $img = Image::make(request()->file('section4_image1'));
            $extension = request()->file('section4_image1')->extension();
            $random = Str::random(30);
            $dt = Carbon::now()->timestamp;
            $section4Image1FileName = $random . '-' . $dt . '.' . $extension;
            $img->save($path.'/'.$section4Image1FileName);
            if(file_exists($oldImagePath)){
                File::delete($oldImagePath);
            }
        }
        if (!empty(request()->file('section4_image2'))) {
            request()->validate([
                'section4_image2' => ['required', 'image', 'mimes:jpeg,jpg,png,svg', 'max:10480'],
            ]);
            $oldImagePath = getAbsolutePath().'/assets/website/images/pages/about/'.$updateAbout->section4_image2;
            $path = getAbsolutePath().'/assets/website/images/pages/about';
            if (!File::isDirectory($path)) {
                File::makeDirectory($path, 0777, true, true);
            }
            $img = Image::make(request()->file('section4_image2'));
            $extension = request()->file('section4_image2')->extension();
            $random = Str::random(30);
            $dt = Carbon::now()->timestamp;
            $section4Image2FileName = $random . '-' . $dt . '.' . $extension;
            $img->save($path.'/'.$section4Image2FileName);
            if(file_exists($oldImagePath)){
                File::delete($oldImagePath);
            }
        }
        $updateAbout->update([
            'banner' => $bannerFileName,
            'banner_heading' => request()->banner_heading,
            'section1_heading' => request()->section1_heading,
            'section1_description' => request()->section1_description,
            'section2_image1' => $section2image1FileName,
            'section2_content1' => request()->section2_content1,
            'section2_image2' => $section2Image2FileName,
            'section2_content2' => request()->section2_content2,
            'section3_heading' => request()->section3_heading,
            'section3_description' => request()->section3_description,
            'section3_image' => $section3ImageFileName,
            'section4_heading1' => request()->section4_heading1,
            'section4_description1' => request()->section4_description1,
            'section4_image1' => $section4Image1FileName,
            'section4_heading2' => request()->section4_heading2,
            'section4_description2' => request()->section4_description2,
            'section4_image2' => $section4Image2FileName,
        ]);
        return response()->json(['msg' => 'Successfully updated.']);
    }

    public function deleteAbout($cmsAboutId)
    {
        $msg = "Some thing went wrong!";
        $code = 400;
        $records = CMSAbout::all();
        $updateAbout = $records->find($cmsAboutId);

        // if (count($records) > 1) {
        //     if (!empty($updateAbout)) {
        //         unlink( '/assets/website/images/pages/about/' . $updateAbout->banner);
        //         $updateAbout->delete();
        //         $msg = "Successfully Delete record!";
        //         $code = 200;
        //     }
        // } else {
        //     $msg = "You have only 1 records Add more records to remove them!";
        //     $code = 302;
        // }


        if (count($records) > 1) {
            if (!empty($updateAbout)) {
                // unlink( '/assets/website/images/pages/about/' . $updateAbout->banner);
                $updateAbout->delete();
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
