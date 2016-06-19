<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Enquiry extends Model
{
    protected $table='enquirys';
     protected $dates = ['created_at', 'updated_at', 'receive_date'];
      protected $fillable = ['id', 'name', 'document','message','email','subject','receive_date'];
         public function setReceiveDateAttribute($value)
{
$this->attributes['receive_date'] =Carbon::now();
}
}
