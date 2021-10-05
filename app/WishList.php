<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Auth;

class WishList extends Model
{
    public $timestamps = false;
    
    protected $fillable = [
        'user_id', 'item_id', 
    ];


    public static function getWish()
    {
    	if(Auth::guard('web')->check()) {
            $wishlist = WishList::where('user_id', Auth::user()->id)->pluck('item_id')->toArray();
        } else {
            $wishlist = [];
        }
        return $wishlist;
    }
}
