<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Member extends Model
{
    use HasFactory;
    protected $fillable = ['member_name', 
                            'member_gender', 
                            'member_email', 
                            'member_password', 
                            'member_address', 
                            'member_phone', 
                            'member_img',
                            'is_active'
                        ];
    protected $primaryKey = 'member_id';
}
