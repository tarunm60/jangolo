<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'marge', 'quality_check',
    ];
    protected $fillable = ['title',
        'description',
        'date',
        'publish_date',
        'parent_id',
        'selected_for_newsletter',
        'status',
        'sale_price',
        'category_id',
        'measure_id'
        ];

    static public function shop()
    {
        return Product::where('is_promo', '=',0)
            ->where('status', '=', 'PUBLISHED')
            ->orderBy('id', 'asc')
            ->with('category')
            ->paginate(8);
            // ->get();
    }

    public function users()
    {
        return $this->belongsToMany('App\User', 'products_users', 'product_id', 'user_id');
    }

    public function sizes()
    {
        return $this->hasMany('App\Productsize', 'product_id');
    }

    public function declinations()
    {
        return $this->hasMany('App\Productdeclination', 'product_id');
    }

    public function measure()
    {
        return $this->belongsTo('App\Productmeasure', 'measure_id');
    }

    public function category()
    {
        return $this->belongsTo('App\Productcategory', 'category_id');
    }

    public function scopePublished($query)
    {
        return $query->where('status', '=', 'PUBLISHED');
    }

    public function scopeTitle($query, $title)
    {
        return $query->where('title', 'LIKE', '%' . $title . '%');
    }

    public function scopeDescription($query, $description)
    {
        return $query->Where('description', 'LIKE', '%' . $description . '%');
    }

    public function getSupplierPrice($user_id)
    {
        return DB::query(
            Database::SELECT, 'select price from products_users where product_id = ' . $this->id . ' and user_id = ' .
            $user_id
        )->execute()->current();
    }

    public function orderitems(){
        return $this->belongsToMany('App\orderitem');
    }

    public function getView()
    {
        return $this->hasOne('App\ProductView');
    }


    public function prices()
    {
        return [
            'gbp' => $this->price_gbp,
            'usd' => $this->price_usd,
            'eur' => $this->price_eur,
            'jpy' => $this->price_jpy
        ];
    }

    /**
     * Price formatted with the currency symbol.
     *
     * @return string
     */
    public function priceDisplay()
    {
        return Currency::withPrefix($this->prices(), null, 2);
    }
}
