<?php

namespace App\Http\Controllers\Website;

use App\Http\Controllers\Controller;
use App\Models\ApplyScholarShip;

use App\Models\ProcessToApply;
use Illuminate\Http\Request;

class ProcessToApplyController extends Controller
{
    public function index()
    {
        $process = ProcessToApply::find(ProcessToApply::PROCESS_TO_APPLY_ID);
        $scholarshipCount = ApplyScholarShip::count();
        return view('website.processToApply', compact('process','scholarshipCount'));
    }
}

