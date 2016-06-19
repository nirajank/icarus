<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
     protected $fillable = ['id', 'name', 'location','contact_number','contact_n2','iframe','email'];
}
