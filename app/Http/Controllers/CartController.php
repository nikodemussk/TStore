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
                $data->setAttribute('id',$cart->id);
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
         return redirect(route("cart.index"));
    }

    public function update($id){
        $cart = \App\Cart::findOrFail($id);
        $stock = $cart->clothes()->first()->stock;
        $qty = request()->validate([
            "quantity" => ["min:1","numeric","max:".$stock]
        ]);

        $cart->update([
            "clothes_id" => $cart->clothes_id,
            "user_id" => auth()->user()->id,
            "quantity" => $qty["quantity"]
        ]);
        return redirect(route("cart"));
    }
}
