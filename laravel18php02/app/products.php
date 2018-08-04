<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class products extends Model
{
     protected $table = 'products';
     public function products_type(){
     	return $this->belongsTo('App\type_products','id_type','id');
     }
     public function bill_detail(){
     	return $this->hasMany('App\bill_detail','id_products','id');
     }
}
