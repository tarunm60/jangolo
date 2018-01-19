<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Kilometrages extends Model
{
    protected $fillable = [
        'kilometrage',
        'ponction',
        'mission',
        'date',
    ];
}
