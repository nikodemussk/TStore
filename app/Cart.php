<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    //
    protected $guarded = [];
    public function clothes()
    {
        return $this->hasMany('App\Clothes');
    }

    public function user(){
        return $this->belongsTo("App\User");
    }
}
