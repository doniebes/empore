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
        $borrowed   = Borrow::where('status', 'borrowed')
                            ->where('member_id', $member_id)->get();
        $periods = Period::all();

        $title = 'Pengembalian Buku';
        return view('book_returns.index', compact('periods', 'member', 
                                                    'member_id', 
                                                    'borrows', 
                                                    'borrowed', 'members', 'title'));
    }

    
    function proses_return(Request $request) {    
    
        $period_id = $request->input('period_id');
        $member_id = $request->input('member_id');
    
        $borrow = Borrow::find($request->input('borrow_id'));
        $borrow->return_date = $request->input('return_date');
        $borrow->borrow_note = $request->input('borrow_note');
        $borrow->status = 'returned';
        $borrow->save();
    
        /** update stock buku */   
        $book_id = $request->input('book_id');
        $book = Book::find($book_id);
        $current_stock = $book->stock;
        $book->stock = $current_stock+1;
       
        if($book->save()){
            // Redirect ke halaman yang diinginkan setelah menyimpan data success
            return redirect()->route('book_returns.index', ['n' => $period_id, 'r' => $member_id])->with('success', 'Returned created successfully.');
        }else{
            // Redirect ke halaman yang diinginkan setelah menyimpan data failed
            return redirect()->route('book_returns.index')->with('error', 'Data created failed.');
        }
        

      }

}
