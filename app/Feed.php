<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Feed extends Model
{
    protected $fillable = [
        'type', 'name', 'email','email_friend', 'phone', 'client_message', 'link', 'name_friend',
    ];

}
