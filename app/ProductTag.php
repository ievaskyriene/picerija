<?php

namespace App;
use App\Product;
use App\Tag;

use Illuminate\Database\Eloquent\Model;

class ProductTag extends Model
{
    public function productRelation(){
        return $this->belongsTo('App\Product', 'product_id', 'id');
   }

   public function tagRelation(){
        return $this->belongsTo('App\Tag', 'tag_id', 'id');
    }
}
