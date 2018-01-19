<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
         'email', 'password', 'firstname', 'lastname', 'shopname', 'date', 'note','remember_token'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *_
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function products()
    {
        return $this->belongsToMany('App\Product', 'products_users', 'user_id', 'product_id')->withPivot('price');
    }

    public function newsletters()
    {
        return $this->belongsToMany('App\Newsletter', 'subscriptions', 'subscriber_id', 'newsletter_id')->withPivot('status');
    }

    public function fullname(){
        return $this->firstname." ".$this->lastname;
    }

}
