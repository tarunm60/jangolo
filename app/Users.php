<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Users extends Model
{
    protected $fillable = [
        'email', 'password', 'username', 'firstname', 'lastname', 'shopname', 'date', 'note',
    ];
}
