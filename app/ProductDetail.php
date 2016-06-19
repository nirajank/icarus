<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductDetail extends Model
{
    protected $table='product_detail';
     protected $fillable = ['id','menu','detail','image','product_id','menu_detail'];
}
