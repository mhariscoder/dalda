<?php

namespace App\Http\Controllers\Cms\Website;

use App\Http\Controllers\Controller;
use App\Models\CMSHome;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Str;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Auth;

class CMSHomeController extends Controller
{
    public function index()
    {
        $resultSet = CMSHome::all();
        return view('cms.website.home.index', compact('resultSet'));
    }

    public function addHome()
    {
        // dd(getAbsolutePath());
        return view('cms.website.home.add');
    }

    public function addHomeData()
    {
                //   dd(request());
        request()->validate([
            'title' => ['required','max:55','unique:cms_home,title'],
            'banner' => ['required', 'image', 'mimes:jpeg,jpg,png', 'max:10480'],
            'description' => ['required']
        ]);

        if (request()->hasFile('banner')) {
            $img = Image::make(request()->file('banner'));
            $extension = request()->file('banner')->extension();
            $random = Str::random(30);
            $dt = Carbon::now()->timestamp;
            $newFileName = $random . '-' . $dt . '.' . $extension;
            $purposePath = getAbsolutePath() . '/assets/website/images/pages/landing';
            $destination = getAbsolutePath() . '/assets/website/images/pages/landing/' . $newFileName;

            if (!File::isDirectory($purposePath)) {
                File::makeDirectory($purposePath, 0777, true, true);
            }

            $img->save($destination);
            CMSHome::create([
                'title' => request()->title,
                'banner' => $newFileName,
                'description' => request()->description,
            ]);
        }
        return response()->json(['msg' => 'Successfully added.']);
    }

    public function updateHome($cmsHomeId)
    {
        $updateHome = CMSHome::findOrFail($cmsHomeId);
        return view('cms.website.home.update', compact('updateHome'));
    }

    public function updateHomeData($cmsHomeId)
    {
        $updateHome = CMSHome::findOrFail($cmsHomeId);
        request()->validate([
            'banner_heading' => ['required'],
            'banner_description' => ['required'],
            'section1_heading' => ['required'],
            'section1_description' => ['required'],
            'section2_heading' => ['required'],
            'card1_heading' => ['required'],
            'card1_description' => ['required'],
            'card2_heading' => ['required'],
            'card2_description' => ['required'],
            // 'card3_heading' => ['required'],
            // 'card3_description' => ['required'],
            'section3_heading' => ['required'],
            'section3_description'=>['required'],
            'section3_sub_heading' => ['required'],
            'section3_sub_description' => ['required'],
            'section3_sub_content' => ['required'],
            'section4_heading' => ['required'],
            'section4_description' => ['required'],
            'section5_heading' => ['required'],
            'section5_description' => ['required'],
            'section6_heading' => ['required'],
            'section6_sub_heading1' => ['required'],
            'section6_sub_description1' => ['required'],
            'section6_sub_link1' => ['required'],
            'section6_sub_description2' => ['required'],
            'section6_sub_link2' => ['required'],
            'section6_sub_description3' => ['required'],
            'section6_sub_link3' => ['required'],
        ]);

        $bannnerName = $updateHome->banner;
        $bannnerMobileName = $updateHome->banner_mobile;

        $sec1ImageName = $updateHome->section1_image;
        $sec1Image2Name = $updateHome->section1_image2;

        $sec2ImageName = $updateHome->section2_image;
        $cardSecImageName = $updateHome->card_section_image;
        $sec6SubImageName1 = $updateHome->section6_sub_image1;
        $sec6SubImageName2 = $updateHome->section6_sub_image2;
        $sec6SubImageName3 = $updateHome->section6_sub_image3;

        if (!empty(request()->file('banner'))) {
            request()->validate([
                'banner' => ['required', 'image', 'mimes:jpeg,jpg,png', 'max:10480'],
            ]);
            $oldImagePath = getAbsolutePath().'/assets/website/images/pages/landing/'.$updateHome->banner;
            $path = getAbsolutePath().'/assets/website/images/pages/landing';
            if (!File::isDirectory($path)) {
                File::makeDirectory($path, 0777, true, true);
            }
            $img = Image::make(request()->file('banner'));
            $extension = request()->file('banner')->extension();
            $random = Str::random(30);
            $dt = Carbon::now()->timestamp;
            $bannnerName = $random . '-' . $dt . '.' . $extension;
            $img->save($path.'/'.$bannnerName);
            if(file_exists($oldImagePath)){
                File::delete($oldImagePath);
            }
        }
        if (!empty(request()->file('banner_mobile'))) {
            request()->validate([
                'banner_mobile' => ['required', 'image', 'mimes:jpeg,jpg,png', 'max:10480'],
            ]);
            $oldImagePath = getAbsolutePath().'/assets/website/images/pages/landing/'.$updateHome->banner_mobile;
            $path = getAbsolutePath().'/assets/website/images/pages/landing';
            if (!File::isDirectory($path)) {
                File::makeDirectory($path, 0777, true, true);
            }
            $img = Image::make(request()->file('banner_mobile'));
            $extension = request()->file('banner_mobile')->extension();
            $random = Str::random(30);
            $dt = Carbon::now()->timestamp;
            $bannnerMobileName = $random . '-' . $dt . '.' . $extension;
            $img->save($path.'/'.$bannnerMobileName);
            if(file_exists($oldImagePath)){
                File::delete($oldImagePath);
            }
        }
        if (!empty(request()->file('section1_image'))) {
            request()->validate([
                'section1_image' => ['required', 'image', 'mimes:jpeg,jpg,png', 'max:10480'],
            ]);
            $oldImagePath = getAbsolutePath().'/assets/website/images/pages/landing/'.$updateHome->section1_image;
            $path = getAbsolutePath().'/assets/website/images/pages/landing';
            if (!File::isDirectory($path)) {
                File::makeDirectory($path, 0777, true, true);
            }
            $img = Image::make(request()->file('section1_image'));
            $extension = request()->file('section1_image')->extension();
            $random = Str::random(30);
            $dt = Carbon::now()->timestamp;
            $sec1ImageName = $random . '-' . $dt . '.' . $extension;
            $img->save($path.'/'.$sec1ImageName);
            if(file_exists($oldImagePath)){
                File::delete($oldImagePath);
            }
        }

        if (!empty(request()->file('section1_image2'))) {
            request()->validate([
                'section1_image2' => ['required', 'image', 'mimes:jpeg,jpg,png', 'max:10480'],
            ]);
            $oldImagePath = getAbsolutePath().'/assets/website/images/pages/landing/'.$updateHome->section1_image2;
            $path = getAbsolutePath().'/assets/website/images/pages/landing';
            if (!File::isDirectory($path)) {
                File::makeDirectory($path, 0777, true, true);
            }
            $img = Image::make(request()->file('section1_image2'));
            $extension = request()->file('section1_image2')->extension();
            $random = Str::random(30);
            $dt = Carbon::now()->timestamp;
            $sec1Image2Name = $random . '-' . $dt . '.' . $extension;
            $img->save($path.'/'.$sec1Image2Name);
            if(file_exists($oldImagePath)){
                File::delete($oldImagePath);
            }
        }
        if (!empty(request()->file('section2_image'))) {
            request()->validate([
                'section2_image' => ['required', 'image', 'mimes:jpeg,jpg,png', 'max:10480'],
            ]);
            $oldImagePath = getAbsolutePath().'/assets/website/images/pages/landing/'.$updateHome->section2_image;
            $path = getAbsolutePath().'/assets/website/images/pages/landing';
            if (!File::isDirectory($path)) {
                File::makeDirectory($path, 0777, true, true);
            }
            $img = Image::make(request()->file('section2_image'));
            $extension = request()->file('section2_image')->extension();
            $random = Str::random(30);
            $dt = Carbon::now()->timestamp;
            $sec2ImageName = $random . '-' . $dt . '.' . $extension;
            $img->save($path.'/'.$sec2ImageName);
            if(file_exists($oldImagePath)){
                File::delete($oldImagePath);
            }
        }
        if (!empty(request()->file('card_section_image'))) {
            request()->validate([
                'card_section_image' => ['required', 'image', 'mimes:jpeg,jpg,png', 'max:10480'],
            ]);
            $oldImagePath = getAbsolutePath().'/assets/website/images/pages/landing/'.$updateHome->card_section_image;
            $path = getAbsolutePath().'/assets/website/images/pages/landing';
            if (!File::isDirectory($path)) {
                File::makeDirectory($path, 0777, true, true);
            }
            $img = Image::make(request()->file('card_section_image'));
            $extension = request()->file('card_section_image')->extension();
            $random = Str::random(30);
            $dt = Carbon::now()->timestamp;
            $cardSecImageName = $random . '-' . $dt . '.' . $extension;
            $img->save($path.'/'.$cardSecImageName);
            if(file_exists($oldImagePath)){
                File::delete($oldImagePath);
            }
        }
        if (!empty(request()->file('section6_sub_image1'))) {
            request()->validate([
                'section6_sub_image1' => ['required', 'image', 'mimes:jpeg,jpg,png', 'max:10480'],
            ]);
            $oldImagePath = getAbsolutePath().'/assets/website/images/pages/landing/'.$updateHome->section6_sub_image1;
            $path = getAbsolutePath().'/assets/website/images/pages/landing';
            if (!File::isDirectory($path)) {
                File::makeDirectory($path, 0777, true, true);
            }
            $img = Image::make(request()->file('section6_sub_image1'));
            $extension = request()->file('section6_sub_image1')->extension();
            $random = Str::random(30);
            $dt = Carbon::now()->timestamp;
            $sec6SubImageName1 = $random . '-' . $dt . '.' . $extension;
            $img->save($path.'/'.$sec6SubImageName1);
            if(file_exists($oldImagePath)){
                File::delete($oldImagePath);
            }
        }
        if (!empty(request()->file('section6_sub_image2'))) {
            request()->validate([
                'section6_sub_image2' => ['required', 'image', 'mimes:jpeg,jpg,png', 'max:10480'],
            ]);
            $oldImagePath = getAbsolutePath().'/assets/website/images/pages/landing/'.$updateHome->section6_sub_image2;
            $path = getAbsolutePath().'/assets/website/images/pages/landing';
            if (!File::isDirectory($path)) {
                File::makeDirectory($path, 0777, true, true);
            }
            $img = Image::make(request()->file('section6_sub_image2'));
            $extension = request()->file('section6_sub_image2')->extension();
            $random = Str::random(30);
            $dt = Carbon::now()->timestamp;
            $sec6SubImageName2 = $random . '-' . $dt . '.' . $extension;
            $img->save($path.'/'.$sec6SubImageName2);
            if(file_exists($oldImagePath)){
                File::delete($oldImagePath);
            }
        }
        if (!empty(request()->file('section6_sub_image3'))) {
            request()->validate([
                'section6_sub_image3' => ['required', 'image', 'mimes:jpeg,jpg,png', 'max:10480'],
            ]);
            $oldImagePath = getAbsolutePath().'/assets/website/images/pages/landing/'.$updateHome->section6_sub_image3;
            $path = getAbsolutePath().'/assets/website/images/pages/landing';
            if (!File::isDirectory($path)) {
                File::makeDirectory($path, 0777, true, true);
            }
            $img = Image::make(request()->file('section6_sub_image3'));
            $extension = request()->file('section6_sub_image3')->extension();
            $random = Str::random(30);
            $dt = Carbon::now()->timestamp;
            $sec6SubImageName3 = $random . '-' . $dt . '.' . $extension;
            $img->save($path.'/'.$sec6SubImageName3);
            if(file_exists($oldImagePath)){
                File::delete($oldImagePath);
            }
        }
        $updateHome->update([
            'banner' => $bannnerName,
            'banner_mobile' => $bannnerMobileName,
            'banner_heading' => request()->banner_heading,
            'banner_description' => request()->banner_description,
            'section1_heading' => request()->section1_heading,
            'section1_description' => request()->section1_description,
            'section1_image' => $sec1ImageName,
            'section1_image2' => $sec1Image2Name,

            'section2_heading' => request()->section2_heading,
            'section2_image' => $sec2ImageName,
            'card1_heading' => request()->card1_heading,
            'card1_description' => request()->card1_description,
            'card2_heading' => request()->card2_heading,
            'card2_description' => request()->card2_description,
            'card3_heading' => request()->card3_heading,
            'card3_description' => request()->card3_description,
            'card_section_image' => $cardSecImageName,
            'section3_heading' => request()->section3_heading,
            'section3_description' => request()->section3_description,

            'section3_sub_heading' => request()->section3_sub_heading,
            'section3_sub_description' => request()->section3_sub_description,
            'section3_sub_content' => request()->section3_sub_content,
            'section4_heading' => request()->section4_heading,
            'section4_description' => request()->section4_description,
            'section5_heading' => request()->section5_heading,
            'section5_description' => request()->section5_description,
            'section6_heading' => request()->section6_heading,
            'section6_sub_heading1' => request()->section6_sub_heading1,
            'section6_sub_description1' => request()->section6_sub_description1,
            'section6_sub_image1' => $sec6SubImageName1,
            'section6_sub_link1' => request()->section6_sub_link1,
            'section6_sub_heading2' => request()->section6_sub_heading2,
            'section6_sub_description2' => request()->section6_sub_description2,
            'section6_sub_link2' => request()->section6_sub_link2,
            'section6_sub_image2' => $sec6SubImageName2,
            'section6_sub_heading3' => request()->section6_sub_heading3,
            'section6_sub_description3' => request()->section6_sub_description3,
            'section6_sub_link3' => request()->section6_sub_link3,
            'section6_sub_image3' => $sec6SubImageName3,
        ]);
        return response()->json(['msg' => 'Successfully updated.']);
    }

    public function deleteHome($cmsHomeId)
    {
        $msg = "Some thing went wrong!";
        $code = 400;
        $records = CMSHome::all();
        $updateHome = $records->find($cmsHomeId);

        // if (count($records) > 2) {
        //     if (!empty($updateHome)) {
        //         $oldImagePath = getAbsolutePath().'/assets/website/images/pages/landing/'.$updateHome->banner;
        //         if(file_exists($oldImagePath)) {
        //             unlink('/assets/website/images/pages/landing/' . $updateHome->banner);
        //         }
        //         $updateHome->delete();
        //         $msg = "Successfully Delete record!";
        //         $code = 200;
        //     }
        // } else {
        //     $msg = "You have only 3 banners records Add more banners to remove them!";
        //     $code = 302;
        // }

        if (!empty($updateHome)) {
                $updateHome->delete();
                $msg = "Successfully Delete record!";
                $code = 200;
            }
        return response()->json(['msg' => $msg], $code);
    }
}
