<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RedirectIfNotAdmin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        // if(in_array($request->user->level, $levels)){
        //     return $next($request);
        // }
        
        // if (Auth::check()) {
            return $next($request);
        // }

        // return redirect()->route('admin.login');

        // if (!auth()->guard('admin')->check()) {
        //     return redirect()->route('admin.login'); // Replace 'member.login' with your actual member login route
        // }
        // return $next($request);
    }
}