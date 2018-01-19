<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Mobile_payments extends Model
{
    protected $fillable = [
        'service',
        'phone',
        'amount',
        'message',
        'country',
        'operator',
    ];
}
