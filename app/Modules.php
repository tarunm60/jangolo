<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Modules extends Model
{
    protected $fillable = [
        'title',
        'description',
        'status',
        'controller',

    ];
}
