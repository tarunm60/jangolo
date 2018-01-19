<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Chicken_foods extends Model
{
    protected $fillable = [
        'date',
        'quantity',
        'type',
        'comment',
    ];
}
