<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Events extends Model
{
    protected $fillable = [
        'titre',
        'description',
        'date',
        'banner_name',

    ];
}
