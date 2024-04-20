<?php

namespace App\Http\Controllers\FrontEnd\Student;

use App\Http\Controllers\Controller;
use App\Models\UploadDocument;
use Illuminate\Http\Request;

class ExamController extends Controller
{
    public function index()
    {
        $exams = UploadDocument::where('type','exam')->latest()->get();
        return view('frontend.student.exam.index',compact('exams'));
    }
}
