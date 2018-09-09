<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class type_products extends Model
{
    protected $table = 'type_products';
    public function products() {
     	return $this->hasMany('App\products','id_typeproducts', 'id');
    }
    public function Category(){
    	return $this->belongsTo('App\Category','category_id','id');
    }
}
