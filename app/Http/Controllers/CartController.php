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

            $carts = auth()->user()->cart()->get();
            $arrayCart = array();

            foreach ($carts as $cart) {
                $data = $cart->clothes()->first();
                $data->setAttribute('quantity',$cart->quantity);
                // dd($data);
                array_push($arrayCart, $data);
            }


            // foreach ($carts as $cart) {
            //     // $data = \App\Cart::findOrFail($cart->id)->clothes()->get();
            //     $data = \App\Clothes::findOrFail($cart->clothes_id);
            //     // dd($data);

            //     // array_push($arrayCart,["quantity" => $cart->quantity]));
            //     # code...
            // }
            // dd($arrayCart);
            return view('cart.index',['carts' => $arrayCart]);
    }

    public function store(){
            \App\Cart::create([
            "clothes_id" => "1",
            "user_id" => auth()->user()->id,
            "quantity"  => "20"
         ]);
    }
}
