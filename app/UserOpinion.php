<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserOpinion extends Model
{
    //
	protected $fillable = [
        'user_id',
        'description',
        
    ];
}
