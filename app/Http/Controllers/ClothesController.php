<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ClothesController extends Controller
{

    public function update($id){
        $clothes = \App\Clothes::findOrFail($id);
        $data = request()->validate([
            "name" => ["required","min:5", 'unique:categories'],
            "category_id" => ["required","exists:categories,id"],
            "price" => ["required","numeric","gt:19999"],
            "stock" => ["required","numeric","gt:0"],
            "description" => ["required","min:20"],
            "image" => ['mimes:jpeg,jpg,png','nullable','image']
        ]);

        if (request('image')){
        $imagePath = request('image')->store('category', 'public');
        }

        $clothes->update(array_merge($data,["image" => $imagePath ?? $clothes->image]));
        // return redirect()
    }

    public function edit($id){
        $categories = \App\Category::all();
        $clothes = \App\Clothes::findOrFail($id);
        return view('clothes.edit',compact('categories'),compact('clothes'));
    }

    public function create(){

        $categories = \App\Category::all();
        // dd($categories);
        return view('clothes.create', compact('categories'));
    }

    public function store(){
        $data = request()->validate([
            "name" => ["required","min:5", 'unique:categories'],
            "category_id" => ["required","exists:categories,id"],
            "price" => ["required","numeric","gt:19999"],
            "stock" => ["required","numeric","gt:0"],
            "description" => ["required","min:20"],
            "image" => ["required",'mimes:jpeg,jpg,png','image']
        ]);


        $imagePath = request('image')->store('category', 'public');
        // dd($data);

        \App\Clothes::create([
            "name" => $data['name'],
            "category_id" => $data['category_id'],
            "price" => $data['price'],
            "stock" => $data['stock'],
            "description" => $data['description'],
            "image" => $imagePath,
        ]);

        return redirect(route('category.create'));
    }


    public function show($id){
        $cloth = \App\Clothes::findOrFail($id);
        return view('clothes.show',compact('cloth'));
    }
}
