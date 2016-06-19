<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    protected $table='menus';
     protected $fillable = ['id', 'name', 'link','theme'];
     public function setNameAttribute($value)
{
$this->attributes['name'] = strtoupper($value);
}
 public function setLinkAttribute($value)
{
$this->attributes['link'] = url($value);
}

}
