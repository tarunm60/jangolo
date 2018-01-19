<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Saleitems extends Model
{
    protected $fillable = [
        'value',
        'quantity',
    ];
}
