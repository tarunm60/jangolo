<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Products extends Model
{
    protected $fillable = [
        'title',
        'description',
        'picture',
        'marge',
        'quantity',
        'status',
        'publish_date',

    ];
}
