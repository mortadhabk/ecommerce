<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Price extends Model
{
    protected $guarded = [];
    public function product()
    {
        return $this->belongsToOne('App\Product','product_id');
    }

}
