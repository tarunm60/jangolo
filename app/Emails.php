<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Emails extends Model
{
    protected $fillable = [
        'status',
        'sender',
        'content',
        'leed_id',
        
    ];
}
