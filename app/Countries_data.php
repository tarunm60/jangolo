<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Countries_data extends Model
{
    protected $fillable = [
        'name',
        'official_name',
        'capital',
        'continent',
        'languages',
    ];
}
