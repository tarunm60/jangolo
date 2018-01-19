<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Newsletters extends Model
{
    protected $fillable = [
        'title',
        'date',
        'description',
        'status',
        'conversion',
    ];
}
