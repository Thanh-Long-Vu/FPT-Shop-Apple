<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckIdAccount
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
        if ( Auth::check() == false ) {
            return redirect()->route('userError');
        }else{
            if($request->id == Auth::user()->id_user ){
                return $next($request);
            }else{
                return redirect()->route('userError');
            }
        }
    }
}
