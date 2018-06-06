<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    protected $fillable=['addressline','zip','city','state','phonenumber','country','user_id'];
}
