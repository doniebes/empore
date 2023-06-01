<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MemberAuthController extends Controller
{
    public function showLoginForm(){
        return view('member.login');
    }

    public function login(Request $request){
        $credentials = $request->only('email', 'password');

        if (Auth::guard('member')->attempt($credentials)) {
            // Autentikasi sukses
            return redirect()->intended(route('member.dashboard'));
        }

        // Autentikasi gagal
        return redirect()->back()->withErrors(['email' => 'Invalid email or password.']);
    }

    public function logout(){
        Auth::guard('member')->logout();
        return redirect()->route('member.login');
    }
}
