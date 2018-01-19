<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    //
     protected $fillable = [
        'user_id',
        'session_id',
        'ip_address',
        'product_id',
        'quantity',
        'price',
    ];
}
