<?php

namespace App;
use App\Category;
use App\Shop;
use App\Price;
use App\Image;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $guarded = [];
    public function categories(){
        return $this->belongsToMany('App\Category');
    }
    public function shop(){
        return $this->belongsTo('App\Shop','shop_id');
     }
     public function prices(){
        return $this->HasMany(Price::class)->orderBy('created_at','DESC');
     }
     public function images(){
        return $this->HasMany(Image::class)->orderBy('created_at','DESC');
     }


}
