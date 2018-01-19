<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Articlecomments extends Model
{
    protected $fillable = [
        'reply',
        'read',
        'comment',
        'date',
        
    ];
}
