<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    //
    protected $guarded = [];
    // public function clothes()
    // {
    //     return $this->belongsTo('App\Clothes');
    // }

    public function clothes()
    {
        return $this->belongsToMany('App\Clothes','cart_clothes');
    }

    // public function clothes()
    // {
    //     return $this->hasOneThrough('App\Clothes', 'App\Cart','clothes_id','id');
    // }

    public function user(){
        return $this->belongsTo("App\User");
    }
}
