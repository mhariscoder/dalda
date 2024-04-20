<?php

namespace App\Http\Controllers\Website;

use App\Http\Controllers\Controller;
use App\Models\CMSMediaCenter;
use App\Models\CMSVolunteer;
use Illuminate\Http\Request;

class VolunteerController extends Controller
{
    public function index()
    {
        $volunteers = CMSVolunteer::latest()->get()->take(10);
        return view('website.volunteer.index',compact('volunteers'));
    }
}
