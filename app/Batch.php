<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Batch extends Model
{
    /**
     * Get the product that owns the batch.
     */
    public function product()
    {
        return $this->belongsTo('App\Product');
    }

    /**
     * Get the status of the batch
     */
    public function status()
    {
        return $this->belongsTo('App\Status');
    }
}
