<?php

namespace App\Http\Controllers\Website;

use App\Http\Controllers\Controller;
use App\Models\CMSAbout;
use Illuminate\Http\Request;

class AboutController extends Controller
{
    public function index()
    {
        $about = CMSAbout::find(CMSAbout::ABOUT_ID);
        return view('website.about', compact('about'));
    }
}
