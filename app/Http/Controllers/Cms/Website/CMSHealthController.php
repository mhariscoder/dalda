<?php

namespace App\Http\Controllers\Cms\Website;

use App\Http\Controllers\Controller;
use App\Models\CMSHealth;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Carbon;

use Intervention\Image\Facades\Image;


class CMSHealthController extends Controller
{

    public function updateList($healthId)
    {
        $health = CMSHealth::where('id', $healthId)->first();
        return view('cms.website.health.update', compact('health'));
    }

    public function updateListData($healthId)
    {
        $health = CMSHealth::findOrFail($healthId);


        request()->validate([
            'heading' => 'required|max:55',
            'description' => 'required',
            'content' => 'required',
            'section1_content1' => 'required',
            'section2_content' => 'required',
            'banner_heading' => 'required',

        ]);
        $bannerName = $health->banner;
        $section1Img1 = $health->section1_image1;
        $section1Img2 = $health->section1_image2;
        // $section2Img1 = $health->section2_image1;
        // $section2Img2 = $health->section2_image2;
        // $section2Img3 = $health->section2_image3;





        // s1i1
        if (!empty(request()->file('section1_image1'))) {
            request()->validate([
                'section1_image1' => ['nullable', 'image', 'mimes:jpeg,jpg,png', 'max:10480'],
            ]);
            $oldImagePath = getAbsolutePath() . '/assets/website/images/pages/health/' . $health->section1_image1;
            $path = getAbsolutePath() . '/assets/website/images/pages/health';
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
            $oldImagePath = getAbsolutePath() . '/assets/website/images/pages/health/' . $health->section1_image2;
            $path = getAbsolutePath() . '/assets/website/images/pages/health';
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


        //     // s2image
        //     if (!empty(request()->file('section2_image1'))) {
        //         request()->validate([
        //             'section2_image1' => ['required', 'image', 'mimes:jpeg,jpg,png', 'max:10480'],
        //         ]);
        //         $oldImagePath = getAbsolutePath() . '/assets/website/images/pages/health/' . $health->section2_image1;
        //         $path = getAbsolutePath() . '/assets/website/images/pages/health';
        //         if (!File::isDirectory($path)) {
        //             File::makeDirectory($path, 0777, true, true);
        //         }
        //         $img = Image::make(request()->file('section2_image1'));
        //         $extension = request()->file('section2_image1')->extension();
        //         $random = Str::random(30);
        //         $dt = Carbon::now()->timestamp;
        //         $section2Img1 = $random . '-' . $dt . '.' . $extension;
        //         $img->save($path . '/' . $section2Img1);
        //         if (file_exists($oldImagePath)) {
        //             File::delete($oldImagePath);
        //         }
        //     }
        // // s2image
        // if (!empty(request()->file('section2_image2'))) {
        //     request()->validate([
        //         'section2_image2' => ['required', 'image', 'mimes:jpeg,jpg,png', 'max:10480'],
        //     ]);
        //     $oldImagePath = getAbsolutePath() . '/assets/website/images/pages/health/' . $health->section2_image2;
        //     $path = getAbsolutePath() . '/assets/website/images/pages/health';
        //     if (!File::isDirectory($path)) {
        //         File::makeDirectory($path, 0777, true, true);
        //     }
        //     $img = Image::make(request()->file('section2_image2'));
        //     $extension = request()->file('section2_image2')->extension();
        //     $random = Str::random(30);
        //     $dt = Carbon::now()->timestamp;
        //     $section2Img2 = $random . '-' . $dt . '.' . $extension;
        //     $img->save($path . '/' . $section2Img2);
        //     if (file_exists($oldImagePath)) {
        //         File::delete($oldImagePath);
        //     }
        // }    // s2image
        // if (!empty(request()->file('section2_image3'))) {
        //     request()->validate([
        //         'section2_image3' => ['required', 'image', 'mimes:jpeg,jpg,png', 'max:10480'],
        //     ]);
        //     $oldImagePath = getAbsolutePath() . '/assets/website/images/pages/health/' . $health->section2_image3;
        //     $path = getAbsolutePath() . '/assets/website/images/pages/health';
        //     if (!File::isDirectory($path)) {
        //         File::makeDirectory($path, 0777, true, true);
        //     }
        //     $img = Image::make(request()->file('section2_image3'));
        //     $extension = request()->file('section2_image3')->extension();
        //     $random = Str::random(30);
        //     $dt = Carbon::now()->timestamp;
        //     $section2Img3 = $random . '-' . $dt . '.' . $extension;
        //     $img->save($path . '/' . $section2Img3);
        //     if (file_exists($oldImagePath)) {
        //         File::delete($oldImagePath);
        //     }
        // }


        if (!empty(request()->file('banner'))) {
            request()->validate([
                'banner' => ['required', 'image', 'mimes:jpeg,jpg,png', 'max:10480'],
            ]);
            $oldImagePath = getAbsolutePath() . '/assets/website/images/pages/health/' . $health->banner;
            $path = getAbsolutePath() . '/assets/website/images/pages/health';
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





        $health->update([
            'heading' => request()->heading,
            'description' => request()->description,
            'content' => request()->content,
            'section1_image1' => $section1Img1,
            'section1_content1' => request()->section1_content1,
            'section1_image2' => $section1Img2,
            'section1_content2' => request()->section1_content2,
            'section2_content' => request()->section2_content,
            'banner' => $bannerName,
            'banner_heading' => request()->banner_heading


        ]);
        return response()->json(['msg' => 'Successfully updated.']);
    }
}
