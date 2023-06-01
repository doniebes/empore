<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminAuthController extends Controller{

    public function showLoginForm(){
        return view('admin.login');
    }

    public function login(Request $request){
        $credentials = $request->only('email', 'password');

        if (Auth::guard('admin')->attempt($credentials)) {
            // Autentikasi sukses
            return redirect()->intended(route('dashboard.admin'));
        }

        // Autentikasi gagal
        return redirect()->back()->withErrors(['email' => 'Invalid email or password.']);
    }

    public function logout(){
        Auth::guard('admin')->logout();
        return redirect()->route('admin.login');
    }
}
