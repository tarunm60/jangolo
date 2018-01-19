<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Forecasts extends Model
{
    protected $fillable = [
        'week',
        'year',
        'value',

    ];
}
