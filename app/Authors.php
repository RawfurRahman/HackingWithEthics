<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Authors extends Model
{
    protected $fillable = [
        'fullName', 'email', 'phone','address','photo','profileText'
    ];
}
