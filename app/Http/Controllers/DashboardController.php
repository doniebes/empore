<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Member;
use App\Models\BookRequest;
use App\Models\Borrow;
use App\Models\Book;

class DashboardController extends Controller
{
    public function admin(){
        // $greeting = $this->greeting();
        $ttl_book_request = count(BookRequest::all());
        $ttl_borrowed = count(Borrow::all());
        $ttl_books = count(Book::all());
        $ttl_members = count(Member::all());
        $title  = 'Dashboard';
        return view('dashboard.admin', compact('title', 'ttl_book_request', 'ttl_borrowed', 'ttl_books', 'ttl_members'));
    }

    public function member(){
        $title  = 'Dashboard';
        $member_id = auth()->guard('member')->user()->member_id;
        $member = Member::where('member_id', $member_id)->first();
        $ttl_book_request = count(BookRequest::all());
        $ttl_borrowed = count(Borrow::all());
        $ttl_books = count(Book::all());
        $ttl_members = count(Member::all());
        return view('dashboard.member', compact('title', 'member', 'ttl_book_request', 'ttl_borrowed', 'ttl_books', 'ttl_members'));
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
