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

    public function store(Request $request, $id){

        $qty = $request->validate([
            "quantity" => "min:1"
        ]);

        $newData = \App\Cart::create([
            "clothes_id" => $id,
            "user_id" => auth()->user()->id,
            "quantity" => $qty["quantity"]
         ]);
         $newData->clothes()->attach($newData->clothes_id);
    }
}
