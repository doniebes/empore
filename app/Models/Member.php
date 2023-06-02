<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Auth\Authenticatable;

class Member extends Model implements \Illuminate\Contracts\Auth\Authenticatable
{
    use HasFactory;
    use Authenticatable;

    protected $fillable = ['member_name', 
                            'member_gender', 
                            'member_email', 
                            'member_password', 
                            'member_address', 
                            'member_phone', 
                            'member_img',
                            'is_active',
                            'member_id'
                        ];
    protected $primaryKey = 'member_id';

    protected $hidden = [
        'member_password', 
    ];

}
