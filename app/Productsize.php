<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Productsize extends Model
{
    protected $table = 'product_sizes';
    protected $fillable = [
        'size',
        'status',
        'measure',
        'is_default',
    ];
}
