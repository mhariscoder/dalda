<?php

namespace App\Http\Controllers\FrontEnd\Student;

use App\Http\Controllers\Controller;
use App\Models\UploadDocument;
use Illuminate\Http\Request;

class EligibilityCriteriaController extends Controller
{
    public function index()
    {
        $criterias = UploadDocument::where('type','eligibility-criteria')->latest()->get();
        return view('frontend.student.eligibility-criteria.index',compact('criterias'));
    }
}
