<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'date','status','transport_fee'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [

    ];

    public function products()
    {
        return $this->belongs('App\Product', 'products_users', 'user_id', 'product_id')->withPivot('price');
    }

    public function items()
    {
        return $this->hasMany('App\Orderitem');
    }

    public function value()
    {

        $total_value = 0;
        foreach ($this->items()->get() as $item) {
            $total_value += $item->value * $item->quantity;
        }
        $total_value += $this->transport_fee;

        return $total_value;
    }

}
