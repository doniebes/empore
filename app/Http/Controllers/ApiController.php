<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;

class ApiController extends Controller
{
    public function get_books(){

        $books = Book::all();
        return response()->json($books);
    }

    // public function book_by_id($id){
    //     $book = Book::find($id);
    //     if (!$book) {
    //         return response()->json(['message' => 'Book not found'], 404);
    //     }
    //     return response()->json($book);
    // }

    public function book_bycode($code){
        $book = Book::where('code',$code)->get();
        // dd($book->toSql());
        if (!$book) {
            return response()->json(['message' => 'Book not found'], 404);
        }
        return response()->json($book);
    }

    public function post_books(Request $request){

        // Validate the incoming request data
        $validatedData = $request->validate([
            'title' => 'required|string',
            'author' => 'required|string',
            'code' => 'required|string',
            'publication_year' => 'nullable|integer',
            'stock' => 'nullable|integer',

        ]);

        // Create a new book record in the database
        $book = Book::create($validatedData);

        // Return a JSON response with the newly created book
        return response()->json(['data' => $book], 201);
    }

    public function put_books(Request $request, $code)
    {
        // $book = Book::findOrFail($id);
        $book = Book::where('code',$code)->get()->first();
        
        // Validasi data yang dikirimkan
        $validatedData = $request->validate([
            'title' => 'required|string',
            'author' => 'required|string',
            'publication_year' => 'nullable|integer',
            'stock' => 'nullable|integer',
        ]);
        
        // Perbarui data buku
        $book->update($validatedData);
        
        // Kirim respon sukses
        return response()->json([
            'message' => 'Data buku berhasil diperbarui',
            'data' => $book
        ], 200);
    }

    public function delete_books(Request $request, $code)
    {
        // $book = Book::findOrFail($id); // Cari buku berdasarkan ID
        $book = Book::where('code',$code)->get()->first();
        $book->delete(); // Hapus buku

        return response()->json(['message' => 'Book deleted successfully']);
    }

}
