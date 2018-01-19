<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Traductions extends Model
{
    protected $fillable = [
        'date',
        'title_end',
        'title_fr',
        'desc_end',
        'desc_fr',
        'tag',
    ];
}
