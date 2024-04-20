<?php

namespace App\Http\Controllers\FrontEnd\Student;

use App\Http\Controllers\Controller;
use App\Models\TestResult;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ResultController extends Controller
{
    public function index()
    {
        $results = TestResult::where('user_id',Auth::id())->latest()->get();
        return view('frontend.student.result.index',compact('results'));
    }
}
