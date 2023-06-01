<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\BookRequest;
use App\Models\Book;
use App\Models\Borrow;
use App\Models\Member;
use App\Models\Period;
use Illuminate\Support\Facades\Session;
use RealRashid\SweetAlert\Facades\Alert;

class BookReturnController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request){

        $member_id = $request->input('r');
        // $data['f'] = $f;
    
        $members    = Member::all();
        $member     = Member::where('member_id', $member_id)->first();
        $borrows    = Borrow::where('member_id', $member_id)->get();
        $borrowed   = Borrow::where('status', 'borrowed')->get();
        $periods = Period::all();

        $title = 'Pengembalian Buku';
        return view('book_returns.index', compact('periods', 'member', 
                                                    'member_id', 
                                                    'borrows', 
                                                    'borrowed', 'members', 'title'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
