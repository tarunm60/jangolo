<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sms extends Model
{
    protected $fillable = [
        'from',
        'message',
        'date',
        'to',
        'status',
        'client',
    ];
}
