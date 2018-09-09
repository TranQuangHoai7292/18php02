<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
   protected $table = 'Category';
   public function Type_Products(){
   	$this->hasMany('App\type_products','category_id','id');
   }
}
