<?php

namespace App\Admin\Company;

use Illuminate\Database\Eloquent\Model;

class HealthCare extends Model
{
    protected $fillable = [
        'name','slug','category','slug_category','location','focus_area','details','logo','images',
    ];

    public static function get_category($value='')
    {
    	return HealthCare::groupBy('category','slug_category')
	    		->select('category','slug_category')
	    		->orderBy('category')
	    		->get();
    }
}
