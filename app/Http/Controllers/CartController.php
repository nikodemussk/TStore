<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CartController extends Controller
{
    //
    public function index(){
            $carts = auth()->user()->cart();
            $arrayCart = array();
            foreach ($carts->get() as $cart) {
                $data = $cart->clothes()->first();
                $data->setAttribute('quantity',$cart->quantity);
                array_push($arrayCart, $data);
            }
            return view('cart.index',['carts' => $arrayCart]);
    }

    public function store(Request $request){

        $newData = \App\Cart::create([
            "clothes_id" => "1",
            "user_id" => auth()->user()->id,
            "quantity"  => "20"
         ]);
         $newData->clothes()->attach($newData->clothes_id);
    }
}
