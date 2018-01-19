<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Orderitem extends Model
{
    protected $fillable = [
        'quantity',
        'value',

    ];
    public $table = 'orderitems';

    public function product(){
        return $this->belongsTo('App\Product');
    }


}
