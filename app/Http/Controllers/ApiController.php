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

    public function book_by_code($code){
        $book = Book::where('code',$code)->get();
        // dd($book->toSql());
        if (!$book) {
            return response()->json(['message' => 'Book not found'], 404);
        }
        return response()->json($book);
    }

}
