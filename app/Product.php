<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table="products";
     protected $fillable = ['id','menu'];
    public function product_detail()
    {
        return $this->hasMany('App\ProductDetail','product_id');
    }
}
