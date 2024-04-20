<?php

namespace App\Http\Controllers\Website;

use App\Http\Controllers\Controller;
use App\Models\CMSImage;
use App\Models\CMSVideo;
use Illuminate\Http\Request;

class MediaController extends Controller
{
    public function gallery()
    {
        $galleryImages = CMSImage::all();
        $galleryVideos = CMSVideo::all();
        return view('website.media.gallery',compact('galleryVideos','galleryImages'));
    }
}
