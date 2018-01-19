<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Banner extends Model
{
    public function image(){
        return $this->belongsTo('App\Image');
    }
   
}
