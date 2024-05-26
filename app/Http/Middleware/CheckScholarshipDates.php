<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Carbon\Carbon;

class CheckScholarshipDates
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        $today = Carbon::today();
        $start_date = Carbon::create($today->year - 1, 11, 1);
        $end_date = Carbon::create($today->year, 7, 31);

        if (!$today->between($start_date, $end_date)) {
            return redirect()->back()->with('error', "Applications and claims can only be created from 1st November to 31st July.");
        }

        return $next($request);
    }
}
