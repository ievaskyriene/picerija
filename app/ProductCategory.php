<?php

namespace App;
use App\Product;
use App\Category;

use Illuminate\Database\Eloquent\Model;

class ProductCategory extends Model
{
   public function productRelation(){
        return $this->belongsTo('App\Product', 'product_id', 'id');
   }

   public function categoryRelation(){
        return $this->belongsTo('App\Category', 'category_id', 'id');
    }
}
