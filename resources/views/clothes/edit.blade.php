@extends('layouts.app')

@section('content')
<form method="post" action="{{ route('clothes.update',$clothes->id) }}" enctype="multipart/form-data">
    @csrf
    @method('PATCH')

    <div class="container-fluid">
    <div class="row pt-5">
        <div class="col-md-3 pt-5">     
             <img src="/storage/{{ $clothes->image }}" class="img-fluid">
        </div>
        <div class="col-md-3">
            <h2 class="mb-3">Cloth Details</h2>
            <!-- <p>{{ $clothes->category }}</p> -->
            <div class="row pt-5">
                <div class="col-md-4">
                    <p><b>{{ __('Name :') }}</b></p>
                </div>
                <div class="col-lg-6 ">
                <input id="name" type="text" class="form-control-cate @error('name') is-invalid @enderror" name="name" value="{{ $clothes->name }}" required autocomplete="name" autofocus>

                    @error('name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>

            <div class="row pt-3">
                <div class="col-md-4 ">
                    <p><b>{{ __('Category :') }}</b></p>
                </div>
                <div class="col-lg-6 ">
                    <!-- {{-- <input id="category_id" type="text" class="form-control @error('category_id') is-invalid @enderror" name="category_id" value="{{ old('category_id') }}" required autocomplete="name" autofocus> --}} -->


                    <select name="category_id" id="category_id" class="form-control-cate @error('category_id') is-invalid @enderror" name="category_id_id" value="{{ old('category_id') }}" required autocomplete="name" autofocus>
                        @foreach ($categories as $category)
                        @if ($category->id == $clothes->category_id)
                            <option value="{{ $category->id }}" selected>{{ $category->name }}</option>
                        @else
                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                        @endif
                        @endforeach
                    </select>

                    @error('category_id')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>

            <div class="row pt-3">
                <div class="col-md-4 ">
                    <p><b>{{ __('Stock :') }}</b></p>
                </div>
                <div class="col-lg-6 ">
                <input id="stock" type="number" class="bottom-bor w-50 @error('stock') is-invalid @enderror" name="stock" value="{{ $clothes->stock }}" required autocomplete="stock" autofocus>

                    @error('stock')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                 <label class="pr-3">{{_('item(s) ready') }}</label>
                </div>
            </div>

            <div class="row">
                <div class="col-md-4 ">
                    <p><b>{{ __('Price :') }}</b></p>
                </div>
                <div class="col-lg-6">
                 <label class="pr-3">{{_('Rp. ') }}</label>
                <input id="price" type="number" class="bottom-bor w-80 @error('price') is-invalid @enderror" name="price" value="{{ $clothes->price }}" required autocomplete="price" autofocus>
                        @error('price')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                </div>
            </div>
            
            <div class="row">
                <div class="col-md-4 ">
                    <p><b>{{ __('Description :') }}</b></p>
                </div>
                <div class="col-lg-8">
                <input id="description" type="text" class="form-control-new-2 @error('description') is-invalid @enderror" name="description" value="{{ $clothes->description }}" required autocomplete="description" autofocus>

                    @error('description')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>
        
        
<div class="row pt-3">
    <div class="col-md-4">
    <p><b>{{ __('Image :') }}</b></p>
    </div>
    <div class="col-lg-8">
    <input id="image" type="file" class="form-control-new @error('image') is-invalid @enderror" name="image" value="{{ old('image') }}" autocomplete="image" autofocus>

        @error('image')
        <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
    </div>
   
    <div class="row pt-3">
        <div class="col-md-4 pl-5">
            <button type="submit" class="btn-new btn-primary-2">
                {{ __('Edit Clothes') }}
            </button>
        </div>
    </div>

    
    </div>
</form>

@endsection
