<?php

namespace App\Http\Controllers\Cms;

use App\Http\Controllers\Controller;
use App\Models\ApplyScholarShip;
use App\Models\ClaimScholarShip;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

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
        $applyForScholorship = ApplyScholarShip::get()->groupBy('status');
        $approved = isset($applyForScholorship['approved']) ? $applyForScholorship['approved']->count() : 0;
        $rejected = isset($applyForScholorship['rejected']) ? $applyForScholorship['rejected']->count() : 0;
        $pending = isset($applyForScholorship['pending']) ? $applyForScholorship['pending']->count() : 0;
        $applyForScholorship['all'] = (int)$approved + (int)$rejected + (int)$pending;
        $applyForScholorship['approved'] = $approved;
        $applyForScholorship['rejected'] = $rejected;
        $applyForScholorship['pending'] = $pending;
        
        $claimedScholarships = ClaimScholarShip::count();
        $claimForScholorship = ClaimScholarShip::get()->groupBy('status');
        
        $approved_ = isset($claimForScholorship['approved']) ? $claimForScholorship['approved']->count() : 0;
        $rejected_ = isset($claimForScholorship['rejected']) ? $claimForScholorship['rejected']->count() : 0;
        $pending_ = isset($claimForScholorship['pending']) ? $claimForScholorship['pending']->count() : 0;
        
        $claimForScholorship['all'] = (int)$approved_ + (int)$rejected_ + (int)$pending_;
        $claimForScholorship['approved'] = $approved_;
        $claimForScholorship['rejected'] = $rejected_;
        $claimForScholorship['pending'] = $pending_;


        return view('cms.index',compact('totalUsers','blockUsers','students','appliedScholarships','claimedScholarships', 'applyForScholorship', 'claimForScholorship'));
    }

    public function formsFilter(Request $request)
    {
        try {
            $start = $request->input('start');
            $end = $request->input('end');

            $applyScholarShip = ApplyScholarShip::whereBetween('created_at', [$start, $end])->get()->count();
            $claimScholarShip = ClaimScholarShip::whereBetween('created_at', [$start, $end])->get()->count();

            $data = (object)[
                'applyScholarShip' => $applyScholarShip,
                'claimScholarShip' => $claimScholarShip
            ];

            return response()->json(['data' => $data], 200);
        } catch (\Exception $th) {
            
        }
    }
}
