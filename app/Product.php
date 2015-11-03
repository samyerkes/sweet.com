<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
	use SoftDeletes;
    public $timestamps = false;

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
}
