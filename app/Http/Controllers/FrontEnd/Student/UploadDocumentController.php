<?php

namespace App\Http\Controllers\FrontEnd\Student;

use App\Http\Controllers\Controller;
use App\Models\UploadDocument;
use Illuminate\Http\Request;

class UploadDocumentController extends Controller
{
    public function index()
    {
        $documents = UploadDocument::whereNotIn('type',['eligibility-criteria','course-offering','exam','test-schedule'])->latest()->get();
        return view('frontend.student.document',compact('documents'));
    }
}
