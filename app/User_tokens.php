<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class User_tokens extends Model
{
    protected $fillable = [
        'token',
        'type',
        'created',
        'expires',
        'user_agent',
        
    ];
}
