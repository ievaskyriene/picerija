<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Category;
use App\Tag;
use App\ProductCategory;
use App\ProductTag;


class Product extends Model
{
    public function getImages()
    {
        return $this->hasMany('App\Image', 'product_id', 'id');
    }

 public function getCategory()
    {
        return $this->hasMany('App\ProductCategory', 'product_id', 'id');
    }

public function category()
    {
        return $this->belongsTo('App\Category', 'category_id', 'id');
    }

public function getTag()
    {
        return $this->hasMany('App\ProductTag', 'product_id', 'id');
    }

public function tag()
    {
        return $this->belongsTo('App\Tag', 'tag_id', 'id');
    }



    // public function getScoutKey()
    // {
    //     return $this->id;
    // }
    
}
