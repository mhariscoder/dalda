<?php

namespace App\Http\Controllers\Website;

use App\Http\Controllers\Controller;
use App\Models\HighAchieversStudent;
use Illuminate\Http\Request;

class StoryController extends Controller
{
    //
    public function index(){
        $stories = HighAchieversStudent::orderBy('position','asc')->get();
        return view('website.story',compact('stories'));
    }
}
