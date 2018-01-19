<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Messages extends Model
{
    protected $fillable = [
        'subject',
        'column1',
        'column2',
        'column3',
    ];
}
