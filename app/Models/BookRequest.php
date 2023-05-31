<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class BookRequest extends Model{
    use HasFactory;
    protected $fillable = ['member_id', 'book_id', 'request_date', 'return_date', 'approval_status'];
    protected $primaryKey = 'book_request_id';

    public static function getBookRequestsAndBooks(){
        return DB::table('book_requests')
                ->join('books', 'book_requests.book_id', '=', 'books.book_id')
                ->join('members', 'book_requests.member_id', '=', 'members.member_id')
                ->select('book_requests.*', 'books.*', 'members.*')
                ->get();
    }


}
