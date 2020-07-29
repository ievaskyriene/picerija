<?php

namespace App;
use App\Tag;
use App\ProductCategory;
use App\ProductTag;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    // protected $fillable = ['parent_id', 'title'];

    public function children()
    {
        return $this->hasMany('App\Category', 'parent_id','id');
    }

    public function products()
    {
        return $this->hasMany('App\Product');
    }

    public function getProducts()
    {
        return $this->hasMany('App\ProductCategory', 'category_id', 'id');
    }
}
