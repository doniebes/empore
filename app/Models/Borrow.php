<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Borrow extends Model
{
    use HasFactory;
    protected $fillable = ['book_request_id', 'member_id', 'book_id', 'borrow_date', 'return_date', 'borrow_note', 'status'];
    protected $primaryKey = 'borrow_id';

}
