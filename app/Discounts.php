<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Discounts extends Model
{
    protected $fillable = [
        'code',
        'discount',
        'emailed',
        'status',
        'type',
    ];
}
