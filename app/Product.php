<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
	use SoftDeletes;

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = ['deleted_at'];

    /**
     * The product is a part of many orders
     */
    public function order()
    {
        return $this->belongsToMany('App\Order', 'order_products')->withPivot('quantity');
    }

    /**
     * The ingredients of the products
     */
    public function ingredient()
    {
        return $this->belongsToMany('App\Ingredient', 'recipes')->withPivot('id', 'quantity');
    }

    /**
     * The category of the products
     */
    public function category()
    {
        return $this->belongsTo('App\Category');
    }

    /**
     * Get the batches for the product.
     */
    public function batch()
    {
        return $this->hasMany('App\Batch');
    }
}
