<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Companies extends Model
{
    protected $fillable = [
        'name',
        'logo',
        'website',
        'telephone',
        'email',
    ];
}
