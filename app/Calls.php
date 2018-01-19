<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Calls extends Model
{
    protected $fillable = [
        'reason',
        'callback',
        'feedback',
        'comment',
        'date',
    ];
}
