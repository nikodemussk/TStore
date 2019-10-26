<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
// use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;


class CategoryController extends Controller
{
    public function __construct(){
        // $this->middleware('admin');
    }


    public function index(){
        $categories = \App\Category::all();
        return view('category.index',compact('categories'));
    }

    public function create(){
        return view("category.create");
    }

    public function store(){
        $data = request()->validate([
            "name" => ["required","min:5", 'unique:categories'],
            "image" => ['mimes:jpeg,jpg,png','nullable','image']
        ]);

        if (request('image')) {
        $image = request()->file('image');
        // $extension = $image->getClientOriginalExtension();
        $imagePath = request('image')->store('category', 'public');
        // dd($imagePath);

        // Storage::disk('public')->put($image->getFilename().'.'.$extension,  File::get($image));
        }
        \App\Category::create([
            'name' => $data['name'],
            'image' => $imagePath ?? ''
        ]);

        return redirect(route('category'));
    }

    public function update($id){
        $data = request()->validate([
            "name" => ["required","min:5", 'unique:categories'],
            "image" => ['mimes:jpeg,jpg,png','nullable','image']
        ]);

        if (request('image')) {
            $imagePath = request('image')->store('profile', 'public');
        }

        $category = \App\Category::findOrFail($id);

        $category->update([
            'name' => $data['name'],
            'image' => $imagePath ?? $category->image,
        ]);
        return redirect(route('category'));
    }

    public function show($id){
        $category = \App\Category::findOrFail($id);
        // dd($category);
        $clothes = $category->clothes()->get();
        // dd($clothes[2]->store()->first()->name);
        // dd($clothes);

        return view('category.show',compact('clothes'));
    }

    public function edit($id){
        $category = \App\Category::findOrFail($id);

        return view('category.edit',compact('category'));
    }

    public function destroy($id){
        \App\Category::findOrFail($id)->delete();
        return redirect(route('category'));
    }
}
