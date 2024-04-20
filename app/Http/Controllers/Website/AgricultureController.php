<?php

namespace App\Http\Controllers\Website;

use App\Http\Controllers\Controller;
use App\Models\CMSAgriculture;
use App\Models\UniversityIcons;

class AgricultureController extends Controller
{
    public function index()
    {
        $agriculture = CMSAgriculture::where('id',CMSAgriculture::AGRICULTURE_ID)->first();
        $uni_logos = UniversityIcons::all();
        $videos_thumbnail = array();
        foreach($agriculture->getVideos as $key => $video){
            $videos_thumbnail[$key] = $video->video_url;
        }
        $videos_thumbnail = moveElements($videos_thumbnail);
        return view('website.agriculture',compact('agriculture','uni_logos','videos_thumbnail'));
    }
}
