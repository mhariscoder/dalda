<?php

namespace App\Http\Controllers\Website;

use App\Http\Controllers\Controller;
use App\Models\CMSMediaCenter;
use Illuminate\Http\Request;

class FaqController extends Controller
{
    public function index()
    {
        $faqs = CMSMediaCenter::where('type','faq')->latest()->get();
        return view('website.faq',compact('faqs'));
    }
}
