<?php

namespace App\Admin\Products;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    //
    protected $fillable = [
        'image','name','details','category','category_ar','name_ar','category_slug',
    ];


    public static function get_category()
	{
	    return Product::groupBy('category','category_slug')
	    		->select('category','category_ar','category_slug')
	    		->orderBy('id')
	    		->get();
	}
}
