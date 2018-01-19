<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tempemails extends Model
{
    protected $fillable = [
        'email',
        'status',
    ];
}
