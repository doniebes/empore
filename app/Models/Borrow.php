<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Borrow extends Model
{
    use HasFactory;
    protected $fillable = ['book_request_id', 'member_id', 'book_id', 'borrow_date', 'return_date', 'borrow_note', 'status'];
    protected $primaryKey = 'borrow_id';

    public static function getBorrowAndBooksByMemberIdAndReturnDate($member_id, $return_date){
        return DB::table('borrows')
                ->leftJoin('books', 'borrows.book_id', '=', 'books.book_id')
                ->leftJoin('members', 'borrows.member_id', '=', 'members.member_id')
                ->select('borrows.*', 'books.*', 'members.*')
                ->where('borrows.member_id',$member_id)
                ->where('borrows.return_date', $return_date)
                ->get();
    }

}
