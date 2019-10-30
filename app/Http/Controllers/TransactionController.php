<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TransactionController extends Controller
{
    //
    public function index(){
        $data = \App\Transaction::all();
        // dd($data);
        return view('transaction.index',['transactions' => $data]);
    }

    public static function store(\App\Cart $cart){
            \App\Transaction::create([
            "clothes_id" => $cart->clothes_id,
            "user_id" => auth()->user()->id,
            "quantity" => $cart->quantity
         ]);

         return redirect(route('transaction.index'));
    }
}
