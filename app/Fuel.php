<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Fuel extends Model
{
    protected $fillable = [
        'kilometrage',
        'montant',
        'quantite',
        'date',
        'station',

    ];
}
