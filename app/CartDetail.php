<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CartDetail extends Model
{
    //
      protected $table = "cartdetail";
    protected $primaryKey = 'CartDetail_Order';
     public $timestamps = false;
      public function lienket_voi_product()
    {
        return $this->belongsTo('App\Product','CartDetail_Product','Product_ID');
        
    }
}
