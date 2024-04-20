<?php

namespace App\Http\Controllers\Website;

use App\Http\Controllers\Controller;
use App\Models\CMSHallOfFame;
use Illuminate\Http\Request;

class HallOfFameController extends Controller
{
    public function index()
    {
        $students = CMSHallOfFame::with('user')->latest()->get();
        return view('website.hall-of-fame.index',compact('students'));
    }
}
