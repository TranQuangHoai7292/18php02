<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class type_products extends Model
{
    protected $table = 'type_products';

    protected $fillable = ['type_products'];

    public function Category(){
    	return $this->belongsToMany('App\Category','products','id_typeproducts','id_category')->withPivot('id','name','color','size','unit_price','promotion_price','image','status');
    }
}
