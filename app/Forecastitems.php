<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Forecastitems extends Model
{
    protected $fillable = [
        'week',
        'year',
        'value',

    ];
}
