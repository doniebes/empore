<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RedirectIfNotMember
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
        if (!auth()->guard('member')->check()) {
            return redirect()->route('member.login'); // Replace 'member.login' with your actual member login route
        }
    
        // return $next($request);

        // if (Auth::check()) {
            // User is already authenticated, proceed to the next request
            // return $next($request);
             // Authentication failed, redirect back to the login page
            // return redirect()->route('member.login');
        // }

        // User is not authenticated, attempt to login using database credentials
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            // Authentication success, redirect to intended route or default route
            return redirect()->intended();
        }
        

       
    }
}
