<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Chicken_weight extends Model
{
    protected $fillable = [
        'weight',
        'date',
        'comment',
    ];
}
