<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Slider extends Model
{
	protected $table='sliders';
     protected $fillable = ['id','image', 'header', 'subheader','link'];
      public function setLinkAttribute($value)
{
$this->attributes['link'] = url($value);
}
    
}
