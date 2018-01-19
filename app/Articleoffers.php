<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Articleoffers extends Model
{
    protected $fillable = [
        'seller_id',
        'status',
        'value',
        'date',

    ];
}
