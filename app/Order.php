<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = [
        'item_id', 'firstname','lastname', 'phone', 'email', 'price', 'comments',
    ];

    public function item()
    {
    	return $this->belongsTo('App\Admin\Items\Item');
    }
}
