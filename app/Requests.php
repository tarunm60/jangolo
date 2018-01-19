<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Requests extends Model
{
    protected $fillable = [
        'amount',
        'note',
        'accepted_file',
        'accepted_date',
        'request_date',
        'rejected_reason',
        'rejected_date',
    ];
}
