<?php

namespace App\Admin\Company;

use Illuminate\Database\Eloquent\Model;

class Egytat extends Model
{
    protected $fillable = [
        'name','slug','category','slug_category','details','logo','images',
    ];

    public static function get_category($value='')
    {
    	return Egytat::groupBy('category','slug_category')
	    		->select('category','slug_category')
	    		->orderBy('category')
	    		->get();
    }
}
