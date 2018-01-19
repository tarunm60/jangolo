<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Articles extends Model
{
    protected $fillable = [
        'date',
        'title',
        'description',
        'category',
        'new',
        'phone',
        'status',
        'sale_date',
        'make_offer',
    ];
}
