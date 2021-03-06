<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    //
    protected $guarded = [];

    public function user(){
        return $this->belongsTo("App\User");
    }

    public function clothes(){
        return $this->belongsTo("App\Clothes");
    }
}
