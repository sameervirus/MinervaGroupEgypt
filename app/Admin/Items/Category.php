<?php

namespace App\Admin\Items;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    //
    public $timestamps = false;
    
    protected $fillable = [
        'category','category_slug','sub_category','layout','menu','sort',
    ];

}
