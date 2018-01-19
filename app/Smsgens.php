<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Smsgens extends Model
{
    protected $fillable = [
        'phone',
        'message',
        'date',
    ];
}
