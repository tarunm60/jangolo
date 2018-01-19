<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tasks extends Model
{
    protected $fillable = [
        'title',
        'description',
        'date',
        'start',
        'weight',
        'priority',
        'status',
        'end',
    ];
}
