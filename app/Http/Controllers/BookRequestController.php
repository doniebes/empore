<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\BookRequest;
use App\Models\Book;
use App\Models\Borrow;
use App\Models\Member;
use Illuminate\Support\Facades\Session;
use RealRashid\SweetAlert\Facades\Alert;

class BookRequestController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(){
        $book_requests = BookRequest::getBookRequestsAndBooks();
        $title = 'Pengajuan Buku';
        return view('book_requests.index', compact('book_requests', 'title'));
    }

    /**
     * method for panel member
     */
    public function member(){
        $title = 'Pengajuan Buku';

        // get session data from guard member
        $member_id = auth()->guard('member')->user()->member_id;
        $books = Book::all();
        $book_requests = BookRequest::getBookRequestsAndBooksByMemberId($member_id);
        // $book_requests = BookRequest::where('member_id', $member_id)->get();
        // print_r($book_requests);
        $member = Member::where('member_id', $member_id)->first();
        return view('book_requests.member', compact('title', 'book_requests', 'member', 'books'));
    }

    public function addBookRequest(Request $request){
        // Validasi data yang diterima dari formulir
        $validatedData = $request->validate([
            'book_id' => 'required',
            'request_date' => 'required',
            'return_date' => 'required',
            'member_id' => 'required',
            'approval_status' => 'required'
        ]);

          // Simpan data buku ke dalam database
          $created = BookRequest::create($validatedData);

          if($created){
            /**add transaksi borrowings */
            $borrow_data = array(
              'book_request_id' => $created->book_request_id,
              'member_id' => $request->input('member_id'),
              'book_id' => $request->input('book_id'),
              'status' => 'pending'
            );
  
            $add_borrowings = Borrow::create($borrow_data);
          }

          if($created){
              // Redirect ke halaman yang diinginkan setelah menyimpan data success
              return redirect()->route('book_requests.member')->with('success', 'Data created successfully.');
          }else{
              // Redirect ke halaman yang diinginkan setelah menyimpan data failed
              return redirect()->route('book_requests.member')->with('error', 'Data created failed.');
          }
    }

    ##################################### End method panel member #################################

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    public function request_approved($id){
        $params = array(
            'approval_status' => 'approved'
          );
      
        // Temukan buku berdasarkan id
        $book_request = BookRequest::find($id);
        
        // Periksa apakah buku ditemukan
        if ($book_request->update($params)) {
            
            /**kurangi stock buku yang dipinjam */
            $book_id = $book_request->book_id;
            $book = Book::find($book_id);

            $current_stock = $book->stock;
            $books = array(
                'stock' => $current_stock-1,
                'book_id' => $book_id
            );
            
            $book->update($books);
            
            /**update borrows */
            $borrow = Borrow::where('book_request_id', $book_request->book_request_id)->first();
            $borrow_data = array(
                'borrow_date' => date('Y-m-d'),
                'status' => 'borrowed'
            );
    
            $borrow->update($borrow_data);
            return redirect()->route('book_requests.index')
            ->with('success', 'BookRequest updated successfully.');
        } else {
            return redirect()->route('book_requests.index')
            ->with('error', 'BookRequest not found.');
        }
        
    }

    public function request_rejected($id){
        $params = array(
            'approval_status' => 'rejected'
          );
      
        // Temukan buku berdasarkan id
        $book_request = BookRequest::find($id);
        // Periksa apakah buku ditemukan
        if ($book_request->update($params)) {
                        
            /**update borrows */
            $borrow = Borrow::where('book_request_id', $book_request->book_request_id)->first();
            $borrow_data = array(
                'status' => 'rejected'
            );
            $borrow->update($borrow_data);
        
            return redirect()->route('book_requests.index')
            ->with('success', 'BookRequest updated successfully.');
        } else {
            return redirect()->route('book_requests.index')
            ->with('error', 'BookRequest not found.');
        }
        
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
