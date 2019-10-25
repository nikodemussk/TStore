<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CartController extends Controller
{
    //
    public function index(){
        \App\Cart::create([
            "clothes_id" => "1",
            "user_id" => auth()->user()->id,
            "quantity"  => "20"
         ]);
            //auth()->user()->cart()->clothes()
        dd(\App\Cart::find(1)->clothes()->get());
    }

    public function store(){

    }
}
