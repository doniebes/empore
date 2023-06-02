<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Member;

class DashboardController extends Controller
{
    public function admin(){
        // $member = Member::where('member_id', $id)->first();
        // $greeting = $this->greeting();
        $title  = 'Dashboard';
        return view('dashboard.admin', compact('title'));
    }

    public function member($id=NULL){

        $title  = 'Dashboard';
        $member = Member::where('member_id', $id)->first();
        return view('dashboard.member', compact('title', 'member'));
    }


    
    function greeting(){
        $date = date ("G : i A");
        if ($date>=0 and $date<10) {
            echo "Selamat Pagi";
        } else if ($date>=10 and $date<15) {
            echo "Selamat Siang";
        } else if ($date>=15 and $date<19) {
            echo "Selamat Sore";
        } else if ($date>=19 and $date<00) {
            echo "Selamat Malam";
        }else echo "Waktu Salah";
    }
    
    
    
}
