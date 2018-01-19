<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product_declination extends Model
{
    protected $fillable = [
        'title',
        'status',
        'is_default',
    ];
}
