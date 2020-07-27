<?php

namespace App;
use App\Product;
use App\Tag;

use Illuminate\Database\Eloquent\Model;

class ProductTag extends Model
{
    public function productRelation(){
        return $this->belongsTo('App\Tag', 'product_id', 'id');
   }

   public function tagRelation(){
        return $this->belongsTo('App\Tag', 'tag_id', 'id');
    }
}
