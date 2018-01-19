<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Newsletter extends Model
{
    public function users(){
        return $this->belongsToMany('App\User','subscriptions','newsletter_id','subscriber_id');
    }
}
