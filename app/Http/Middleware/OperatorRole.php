<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class OperatorRole
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
        if(\Auth::check()){
            if(\Auth::user()->id_role === 2){
                return $next($request);
            }
        }
        
        return redirect()->route('index__page');
    }
}
