<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CartController extends Controller
{
    //
    public function index(){

            // dd(\App\Cart::find(1)->clothes()->get());
            // dd();
            $carts = auth()->user()->cart()->clothes();
            $arrayCart = array();
            // foreach ($carts as $cart) {
            //     // $data = \App\Cart::findOrFail($cart->id)->clothes()->get();
            //     $data = \App\Clothes::findOrFail($cart->clothes_id);
            //     // dd($data);

            //     // array_push($arrayCart,["quantity" => $cart->quantity]));
            //     # code...
            // }
            // dd($arrayCart[0]);
            return view('cart.index',['carts' => $arrayCart]);
        // $carts = ;

    }

    public function store(){
            \App\Cart::create([
            "clothes_id" => "1",
            "user_id" => auth()->user()->id,
            "quantity"  => "20"
         ]);
    }
}
