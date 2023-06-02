<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Borrow;
use Illuminate\Support\Facades\Session;
use RealRashid\SweetAlert\Facades\Alert;

class BorrowController extends Controller
{
    public function index(){
        $member_id = auth()->guard('member')->user()->member_id;
        $borrows = Borrow::where('member_id', $member_id)->get();
        $title = 'List Pinjaman';
        return view('borrows.index', compact('borrows', 'title'));
    }
}
