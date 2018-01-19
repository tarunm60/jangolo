<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Productcategory extends Model
{
    protected $table = 'products_categories';
    protected $fillable = ['title','description','status','created_at','updated_at','parent_id'];

    public static function activeCategories()
    {
        $products = Product::published()->get()->pluck('id')->toArray();

        return Productcategory::whereIn('id', $products)
            ->where('title', '!=', 'Package')
            // ->groupBy('id')
            ->orderBy('title','asc')
            ->get();
    }

    public function products()
    {
        return $this->hasMany('App\Product','category_id','id');
    }


    public function productCounts()
    {
        return $this->hasMany('App\Product','category_id','id')->selectRaw('category_id, count(*) as count')->groupBy('category_id');
    }


}
