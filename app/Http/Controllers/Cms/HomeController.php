<?php

namespace App\Http\Controllers\Cms;

use App\Http\Controllers\Controller;
use App\Models\ApplyScholarShip;
use App\Models\ClaimScholarShip;
use App\Models\User;

class HomeController extends Controller
{
    public function index(){
        $users = User::with(['roles'])->get();
        $totalUsers = $users->count();
        $students = $users->filter(function ($value){
            return $value->roles()->first() ? $value->roles()->first()->name === 'student' : 0;
        })->count();
        $blockUsers = $users->filter(function ($value){
            return $value->is_block === 1;
        })->count();
        $appliedScholarships = ApplyScholarShip::count();
        $claimedScholarships = ClaimScholarShip::count();
        return view('cms.index',compact('totalUsers','blockUsers','students','appliedScholarships','claimedScholarships'));
    }
}
