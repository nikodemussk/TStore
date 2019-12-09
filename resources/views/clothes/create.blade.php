@extends('layouts.app')

@section('content')
<form method="POST" action="{{ route('clothes.store') }}" enctype="multipart/form-data">
    @csrf
   
    <h2 class="text-center py-3 pt-3">{{ __('Clothes Details') }}</h2>
<br>
<div class="form-group row justify-content-center">
 
    <label for="name" class="col-md-1 col-form-label text-md-left">{{ __('Name:') }}</label>

    <div class="col-md-2">
        <input id="name" type="text" class="form-control-new @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus placeholder="Insert Cloth Name">

        @error('name')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
</div>

<div class="form-group row justify-content-center">
    <label for="category_id" class="col-md-1 col-form-label text-md-left">{{ __('Category:') }}</label>

    <div class="col-md-2">
        <!--{{-- <input id="category_id" type="text" class="form-control-new @error('category_id') is-invalid @enderror" name="category_id" value="{{ old('category_id') }}" required autocomplete="name" autofocus> --}} -->


        <select name="category_id" id="category_id" placeholder="--Choose Category--" class="form-control-cate @error('category_id') is-invalid @enderror" name="category_id_id" value="{{ old('category_id') }}" required autocomplete="name" autofocus>
            @foreach ($categories as $category)
                <option value="{{ $category->id }}">{{ $category->name }}</option>
            @endforeach
        </select>

        @error('category_id')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
</div>

<div class="form-group row justify-content-center">
    <label for="stock" class="col-md-1 col-form-label text-md-left pl-0">{{ __('Stock:') }}</label>

    <div class="row col-md-2">
            <input id="stock" type="number" class="bottom-bor w-25 @error('stock') is-invalid @enderror" name="stock" value="{{ old('stock') }}" required autocomplete="stock" autofocus>

        @error('stock')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
            <label class="pl-3">{{ __('item(s) ready') }}</label>
    </div>
</div>

<div class="form-group row justify-content-center">
    <label for="price" class="col-md-1 col-form-label text-md-left">{{ __('Price:') }}</label>

    <div class="col-md-2">
        <label class="pr-3">{{_('Rp. ') }}</label>
        <input id="price" type="number" class="bottom-bor w-50 @error('price') is-invalid @enderror" name="price" value="{{ old('price') }}" required autocomplete="price" autofocus>

        @error('price')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
</div>

<div class="form-group row justify-content-center">
        <label for="description" class="col-md-1 col-form-label text-md-left">{{ __('Description:') }}</label>

        <div class="col-md-2">
            <textarea id="description" type="text" class="form-control-new-2 @error('description') is-invalid @enderror" name="description" value="{{ old('description') }}" required autocomplete="description" autofocus>
            </textarea>
            @error('description')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
    </div>


<div class="form-group row justify-content-center">
    <label for="image" class="col-md-1 col-form-label text-md-left">{{ __('Change Image:') }}</label>

    <div class="col-md-2">
        <input id="image" type="file" class="form-control-new @error('image') is-invalid @enderror" name="image" value="{{ old('image') }}" autocomplete="image" autofocus>

        @error('image')
        <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
    </div>

    <div class="form-group row mb-0 justify-content-center">
        <div class="pt-3">
            <button type="submit" class="btn-new btn-primary-2">
                {{ __('Add Items') }}
            </button>
        </div>
    </div>
</form>

@endsection
