<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Clothes extends Model
{
    //
    protected $guarded = [];

    public function cart()
    {
        return $this->belongsToMany('App\Cart','cart_clothes');
    }

    public function store()
    {
        return $this->belongsTo('App\Store');
    }
}
