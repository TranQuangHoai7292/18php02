<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
   protected $table = 'Category';

   protected $fillable = ['category'];

   public function type_products(){
   		return $this->belongsToMany('App\type_products','products','id_category','id_typeproducts')->withPivot('id','name','color','size','unit_price','promotion_price','image','status');
   }
}
