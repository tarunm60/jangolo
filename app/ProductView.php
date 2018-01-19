<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductView extends Model
{
    //
    protected $fillable = [
        'product_id',
        'view_count',
    ];
}
