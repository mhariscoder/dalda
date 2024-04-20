<?php

namespace App\Http\Controllers\FrontEnd\Student;

use App\Http\Controllers\Controller;
use App\Models\UploadDocument;
use Illuminate\Http\Request;

class CourseOfferingController extends Controller
{
    public function index()
    {
        $courses = UploadDocument::where('type','course-offering')->latest()->get();
        return view('frontend.student.course-offering.index',compact('courses'));
    }
}
