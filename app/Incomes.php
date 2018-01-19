<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Incomes extends Model
{
    protected $fillable = [
        'date',
        'value',
    ];
}
