<?php

namespace App\Http\Controllers\FrontEnd;

use App\Http\Controllers\Controller;
use App\Models\ApplyScholarShip;
use App\Models\ClaimScholarShip;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function index(){
        $apply = ApplyScholarShip::where('user_id',Auth::id())->get();
        $claim = ClaimScholarShip::where('user_id',Auth::id())->get();
        $appliedApprovedScholarships = $apply->where('status','approved')->count();
        $appliedRejectedScholarships = $apply->where('status','rejected')->count();
        $claimedApprovedScholarships =$claim->where('status','approved')->count();
        $claimedRejectedScholarships = $claim->where('status','rejected')->count();
        return view('frontend.index',compact('appliedApprovedScholarships','appliedRejectedScholarships','claimedApprovedScholarships','claimedRejectedScholarships'));
    }
}
