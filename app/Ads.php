<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ads extends Model
{
    protected $fillable = [
        'title', 'text', 'email', 'city', 'address', 'phone', 'price', 'price_new', 'status', 'edit_token'
    ];
}
