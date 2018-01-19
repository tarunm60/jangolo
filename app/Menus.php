<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Menus extends Model
{
    protected $fillable = [
        'title',
        'description',
        'status',
        'url',
    ];
}
