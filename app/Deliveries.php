<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Deliveries extends Model
{
    protected $fillable = [
        'evaluation',
        'comment',
        'date',
        'rejection_reason',
        'start_date',
    ];
}
