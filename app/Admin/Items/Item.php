<?php

namespace App\Admin\Items;

use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    //
    protected $fillable = [
        'price','category','category_slug','sub_category','sub_category_slug','layout','book_url','logo','images', 'currency_id'
    ];


    /**
     * Get the data record associated with the item.
     */
    public function dataItem()
    {
        return $this->hasMany('App\Admin\Items\ItemData');
    }

    public function currency()
    {
        return $this->belongsTo('App\Currency');
    }

}
