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

        return redirect(route('category.create'));
    }

    public function update(){

    }

    public function show($id){
        $category = \App\Category::findOrFail($id);
        // dd($category);
        $clothes = $category->clothes()->get();
        // dd($clothes);
        return view('category.show',compact('clothes'));
    }
}
