<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ingredient extends Model
{
	public $timestamps = false;
	
    /**
     * The ingredients of the products
     */
    public function product()
    {
        return $this->belongsToMany('App\Product', 'recipes')->withPivot('id', 'quantity');
    }

    /**
     * Get the supplier of the ingredient
     */
    public function supplier()
    {
        return $this->belongsTo('App\Supplier');
    }

    /**
     * The product is a part of many orders
     */
    public function supplyorder()
    {
        return $this->belongsToMany('App\SupplyOrder', 'ingredient_supply_orders')->withPivot('quantity');
    }
}
