<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Queues extends Model
{
    protected $fillable = [
        'sender',
        'receiver',
        'creator',
        'sent',
    ];
}
