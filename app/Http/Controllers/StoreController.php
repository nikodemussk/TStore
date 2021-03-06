<?php

namespace App\Http\Controllers;

use App\Store;
use Illuminate\Http\Request;

class StoreController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        if(auth()->user()->store()->first() != null){
            return redirect(route("store.manage"));
        } else {
            return view("store.create");
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //

        $data = $request->validate([
            "name" => ["required", "min:5"],
            "description" => ["required", "min:20"],
            "address" => ["required", "min:10"],
            "image" => ["required", 'mimes:jpeg,jpg,png', 'image'],
        ]);
        // dd($data);

        if (request('image')) {
            $imagePath = request('image')->store('store', 'public');
        }
        // dd();

        \App\Store::create(array_merge($data,["image" => $imagePath],["user_id" => auth()->user()->id]));

        return redirect(route('store.manage'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Store  $store
     * @return \Illuminate\Http\Response
     */
    public function show(Store $store)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Store  $store
     * @return \Illuminate\Http\Response
     */
    public function edit(Store $store, $id)
    {
        //
        if(auth()->user()->store()->first()->user_id == auth()->user()->id){
            $store = $store->findOrFail($id);
            return view("store.edit", ["store" => $store] );
        } else {
            return redirect(route("store.create"));
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Store  $store
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Store $store, $id)
    {
        //
        $store = $store->findOrFail($id);
        $data = $request->validate([
            "name" => ["required", "min:5"],
            "description" => ["required", "min:20"],
            "address" => ["required", "min:10"],
            "image" => ['mimes:jpeg,jpg,png', 'image'],
        ]);

        if (request('image')) {
            $imagePath = request('image')->store('store', 'public');
        }

        $store->update(array_merge($data,["image" => $imagePath ?? $store->image]));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Store  $store
     * @return \Illuminate\Http\Response
     */
    public function destroy(Store $store,$id)
    {
        //
        $store->destroy($id);
        return redirect(route("store.manage"));
    }

    public function manage(){
        if(auth()->user()->store()->first() == null){
            return redirect(route("store.create"));
        } else {
            $clothes = auth()->user()->store()->first()->clothes()->get();
            $store = auth()->user()->store()->first();
            return view("store.manage",compact("clothes"),compact("store"));
        }
    }
}
