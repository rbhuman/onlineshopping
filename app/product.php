<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class product extends Model
{
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';

    protected $fillable=['name','description','size','category_id','image'];
    protected $table='products';
    
    public function category(){
        return $this->belongsTo(Category::class);
    }
}
