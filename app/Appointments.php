<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Appointments extends Model
{
    protected $fillable = [ 
        'date',
        'appointment',
        'comment',
    ];
}
