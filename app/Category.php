<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $guarded = [];
    //
    public function clothes()
    {
        return $this->hasMany('App\Clothes');
    }
}
