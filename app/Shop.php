<?php

namespace App;
use App\Product;
use App\User;
use Illuminate\Database\Eloquent\Model;

class Shop extends Model
{
    protected $guarded = [];
    public function user()
    {
        return $this->belongsTo('App\User','user_id');
    }
    public function products(){
        return $this->HasMany(Product::class)->orderBy('created_at','DESC');
     }

}
