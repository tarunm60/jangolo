<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Bandes extends Model
{
    protected $fillable = [
        'date',
        'status',
        'title',
    ];
}
