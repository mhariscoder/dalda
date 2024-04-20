<?php

namespace App\Http\Controllers\Website;

use App\Http\Controllers\Controller;
use App\Models\CMSHealth;
use Illuminate\Http\Request;

class HealthController extends Controller
{
    public function index()
    {
        $health = CMSHealth::where('id',CMSHealth::HEALTH_ID)->first();
        $videos_thumbnail = array();
        foreach($health->getVideos as $key => $video){
            $videos_thumbnail[$key] = $video->video_url;
        }
        $videos_thumbnail = moveElements($videos_thumbnail);
        return view('website.health',compact('health','videos_thumbnail'));
    }
}
