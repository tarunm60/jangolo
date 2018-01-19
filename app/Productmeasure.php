<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Productmeasure extends Model
{
    protected $table = 'product_measures';
    protected $fillable = ['measure','description','status'];
    public function products()
    {
        return $this->hasMany('App\Product', 'measure_id');
    }
    
}
