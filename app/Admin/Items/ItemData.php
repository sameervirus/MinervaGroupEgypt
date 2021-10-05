<?php

namespace App\Admin\Items;

use Illuminate\Database\Eloquent\Model;

class ItemData extends Model
{
    //
    protected $fillable = [
        	'item_id','languagecode','name','name_slug','duration','locations','short_description','highlights','description', 'day_by_day', 'inclusions', 'exclusions', 'details', 'flights_transport', 'group_size', 'accommodations', 'cancellation_policy', 'additional_info', 'know_before_book',
    ];


    public function getItem()
    {
    	return $this->belongsTo('App\Admin\Items\Item','item_id');
    }

}
