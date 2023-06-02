<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Member;

use Illuminate\Support\Facades\Hash;

class MemberAuthController extends Controller
{
    public function showLoginForm(){
        return view('member.login');
    }

    public function login(Request $request){

        // $inputPassword = $request->input('member_password');
        // $codeIgniterHashedPassword=NULL;
        // if(!empty(Member::where('member_id', $request->input('member_id'))->first()->member_password)){
        //     $codeIgniterHashedPassword = Member::where('member_id', $request->input('member_id'))->first()->member_password;
        // }
        
        // // Konversi Password ke Bcrypt
        // if (hash('sha1', $inputPassword) === $codeIgniterHashedPassword) {

        //     $newBcryptPassword = Hash::make($inputPassword);
        //     // Simpan $newBcryptPassword ke kolom password di database
        //     $member = Member::find($request->input('member_id'));
        //     $member->member_password = $newBcryptPassword;
            
        //     if($member->save()){

        //         $credentials = [
        //             'member_id' => $request->input('member_id'),
        //             'password' => $newBcryptPassword,
        //         ];

              
        //         // if (Auth::guard('member')->attempt($credentials)) {
        //         if (Auth::guard('member')->getProvider()->retrieveByCredentials($credentials)) {

        //                 $user = Member::where('member_id', $credentials['member_id'])->first();
        //                 // User found, set the authenticated user
        //                 Auth::guard('member')->setUser($user);
                

        //             return redirect()->intended(route('dashboard.member'));
        //         }

        //     }
            
        // } else {

                      
            $credentials = [
                'username' => $request->input('username'),
                'password' => $request->input('password'),
            ];
            // print_r($credentials);
            
            if (Auth::guard('member')->attempt($credentials)) {
                // Autentikasi sukses
                $member_id = Member::where('username', $request->input('username'))->first()->member_id;
                return redirect()->intended(route('dashboard.member', $member_id));
            }
    
            // Autentikasi gagal
            return redirect()->back()->withErrors(['email' => 'Invalid email or password.']);

        // }

       
    }

    public function logout(){
        Auth::guard('member')->logout();
        return redirect()->route('member.login');
    }
}
