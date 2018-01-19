<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product_sizes extends Model
{
    protected $fillable = [
        'size',
        'measure',
        'status',
    ];
}
