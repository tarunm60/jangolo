<?php

namespace App;


class Customer extends User
{
    protected $table = 'users';

    public function orders(){
        return $this->hasMany('App\Order','customer_id');
    }
    
}
