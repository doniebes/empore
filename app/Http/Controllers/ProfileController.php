<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Member;
use Illuminate\Support\Facades\Session;
use RealRashid\SweetAlert\Facades\Alert;

class ProfileController extends Controller
{
    public function index($id){
        $member = Member::where('member_id', $id)->first();
        $title  = 'Profil';
        return view('profile.index', compact('member', 'title'));
    }
}
