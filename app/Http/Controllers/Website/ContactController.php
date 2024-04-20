<?php

namespace App\Http\Controllers\Website;

use App\Http\Controllers\Controller;
use App\Models\CMSAbout;
use App\Models\CMSContact;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function index()
    {
        $contact = CMSContact::latest()->first();
        return view('website.contact',compact('contact'));
    }
}
