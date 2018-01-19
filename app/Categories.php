<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Categories extends Model
{
    protected $fillable = [
        'name',
        'description',
        'parent',
        'status',
        'icon',
        'is-front',
        'namefr',
    ];
}
