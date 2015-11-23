<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Supplyorder extends Model
{
    /**
     * The products of the orders
     */
    public function ingredients()
    {
        return $this->belongsToMany('App\Ingredient', 'ingredient_supply_orders')->withPivot('id', 'quantity');;
    }

    /**
     * Get the status of the order
     */
    public function status()
    {
        return $this->belongsTo('App\Status');
    }

    /**
     * Get the supplier of the order
     */
    public function supplier()
    {
        return $this->belongsTo('App\Supplier');
    }
}
