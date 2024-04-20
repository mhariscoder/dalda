<?php

namespace App\Http\Controllers\Website;

use App\Http\Controllers\Controller;
use App\Models\HighAchieversStudent;
use Illuminate\Http\Request;

class AchieverProfileController extends Controller
{
    public function index($achieverId)
    {

        $allAchievers = HighAchieversStudent::take(5)->where('student_id','!=',$achieverId)->orderBy('position', 'asc')->get();

        $achiever = HighAchieversStudent::where('student_id',$achieverId)->first();
        if(!$achiever){
            return redirect()->back();
        }
        return view("website.achieversProfile", compact('achiever','allAchievers'));
    }
}
