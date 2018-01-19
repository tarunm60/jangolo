<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Contacts extends Model
{
    public $table = 'contacts';
    
    protected $fillable = [
        'nom',
        'telephone',
        'email',
        'subject',
        'message'
    ];
}
