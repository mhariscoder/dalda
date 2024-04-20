<?php

namespace App\Http\Controllers\FrontEnd\Student;

use App\Http\Controllers\Controller;
use App\Models\UploadDocument;
use Illuminate\Http\Request;

class TestScheduleController extends Controller
{
    public function index()
    {
        $tests = UploadDocument::where('type','test-schedule')->latest()->get();
        return view('frontend.student.test-schedule.index',compact('tests'));
    }
}
