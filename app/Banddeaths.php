<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Banddeaths extends Model
{
    protected $fillable = [
        'date',
        'quantity',
        'description',
    ];
}
