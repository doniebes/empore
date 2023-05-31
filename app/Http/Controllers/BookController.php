<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;
use Illuminate\Support\Facades\Session;
use RealRashid\SweetAlert\Facades\Alert;


class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(){

        $books = Book::all();
        $title = 'Buku';
        return view('books.index', compact('books', 'title'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(){
        return view('books.form');
    }

    /**
     * Store a newly created resource in storage.
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
     * Update the specified resource in storage.
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id){
        // Validasi data yang diterima dari form
        $request->validate([
            'title' => 'required',
            'author' => 'required',
            'publication_year' => 'required',
        ]);

        // Temukan buku berdasarkan id
        $book = Book::find($id);

        // Periksa apakah buku ditemukan
        if ($book) {
            // Update data buku dengan data yang diterima dari form
            $book->title = $request->input('title');
            $book->author = $request->input('author');
            $book->publication_year = $request->input('publication_year');
            $book->save();

            return redirect()->route('books.index')->with('success', 'Book updated successfully.');
        } else {
            return redirect()->route('books.index')->with('error', 'Book not found.');
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
        $book = Book::findOrFail($id);
        return view('books.show', compact('book'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $book = Book::findOrFail($id);
        return view('books.form', compact('book'));
    }

   

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($book_id){
        // Temukan buku berdasarkan ID
        // $book = Book::findOrFail($book_id);

         // Temukan buku berdasarkan slug
         // $book = Book::where('book_id', $book_id)->first();
         $book = $book = Book::find($book_id);

          // Hapus buku dari database
        if ($book) {
            $book->delete();
            return redirect()->route('books.index')->with('success', 'Book deleted successfully.');
        } else {
            return redirect()->route('books.index')->with('error', 'Book not found.');
        }
    }
}
