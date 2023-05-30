<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Member;
use Illuminate\Support\Facades\Session;
use RealRashid\SweetAlert\Facades\Alert;


class MemberController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(){

        $members = Member::all();
        $title = 'Anggota';
        return view('members.index', compact('members', 'title'));
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
    public function store(Request $request){

        // Validasi data yang diterima dari formulir
        $validatedData = $request->validate([
           'code' => 'required',
           'title' => 'required',
           'author' => 'required',
           'publication_year' => 'required',
           'stock' => 'required'
       ]);

        // Update data buku dengan data yang diterima dari form
        $book_id = $request->input('book_id');

        if($book_id){
           // Temukan buku berdasarkan id
           $book = Book::find($book_id);

           $book->code = $request->input('code');
           $book->title = $request->input('title');
           $book->author = $request->input('author');
           $book->publication_year = $request->input('publication_year');
           $book->stock = $request->input('stock');
           $book->save();

           if($book->save()){
               // Redirect ke halaman yang diinginkan setelah update data success
               return redirect()->route('books.index')->with('success', 'Book updated successfully.');
           }else{
               // Redirect ke halaman yang diinginkan setelah update data failed
               return redirect()->route('books.index')->with('error', 'Book updated failed.');
           }
           
        }else{

           // Simpan data buku ke dalam database
           $created = Book::create($validatedData);

           if($created){
               // Redirect ke halaman yang diinginkan setelah menyimpan data success
               return redirect()->route('books.index')->with('success', 'Book created successfully.');
           }else{
               // Redirect ke halaman yang diinginkan setelah menyimpan data failed
               return redirect()->route('books.index')->with('error', 'Book created failed.');
           }

        }

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
