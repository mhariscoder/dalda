<?php

namespace App\Http\Controllers\Website;

use App\Http\Controllers\Controller;
use App\Models\CMSScreeningCriteria;
use Illuminate\Http\Request;

class ScreeningCriteriaController extends Controller
{
    public function index()
    {
        $screening = CMSScreeningCriteria::find(CMSScreeningCriteria::SCREENING_CRITERIA_ID);
        return view('website.screeningCriteria', compact('screening'));
    }
}

