<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Chicken_orders extends Model
{
    protected $fillable = [
        'weight',
        'quantity',
        'delivery_date',
        'telephone',
        'name',
        'email',
        'location',
        'message',
        'date',
        'status',
    ];
}
