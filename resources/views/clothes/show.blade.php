@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row pt-5">
        <div class="col-md-3 pt-5">     
             <img src="/storage/{{ $clothes->image }}" class="img-fluid">
        </div>
        <div class="col-md-3">
            <h2 class="mb-3">Cloth Details</h2>
            <!-- <p>{{ $clothes->category }}</p> -->
            <div class="row pt-4">
                <div class="col-md-4">
                    <p><b>{{ __('Name :') }}</b></p>
                </div>
                <div class="col-lg-6 ">
                     <p>{{ $clothes->name }}</p>
                </div>
            </div>

            <div class="row">
                <div class="col-md-4 ">
                    <p><b>{{ __('Store :') }}</b></p>
                </div>
                <div class="col-lg-6 ">
                    <p>{{ $clothes->store->name }}</p>
                </div>
            </div>

            <div class="row">
                <div class="col-md-4 ">
                    <p><b>{{ __('Stock :') }}</b></p>
                </div>
                <div class="col-lg-6 ">
                    <p>{{ $clothes->stock }} item(s) ready</p>
                </div>
            </div>

            <div class="row">
                <div class="col-md-4 ">
                    <p><b>{{ __('Price :') }}</b></p>
                </div>
                <div class="col-lg-6">
                     <p>Rp. {{ $clothes->price }}</p>
                </div>
            </div>
            
            <div class="row">
                <div class="col-md-4 ">
                    <p><b>{{ __('Description :') }}</b></p>
                </div>
                <div class="col-lg-8">
                      <p>{{ $clothes->description }}</p>
                </div>
            </div>
        
@if (auth()->user())
<form method="post" action="{{ route('cart.store', $clothes->id) }}" enctype="multipart/form-data">
    @csrf
    
    <h2 class="mt-5 mb-3">Add to cart</h2>
    <div class="row">
        <div class="col-md-2">
            <p><b>Quantity</b></p>
        </div>
    <div class="col-md-5">
        <input id="quantity" type="number" class="bottom-bor w-50 @error('quantity') is-invalid @enderror" name="quantity" value="{{ $clothes->quantity }}" required autocomplete="quantity" autofocus>
        
        @error('quantity')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
    </div>
    <br>
    <div class="">
        <div class="">
            <button type="submit" class="btn-new btn-primary-2">
                {{ __('Add to Cart') }}
            </button>
        </div>
    </div>
</div>
    </div>
</div>
</form>
@endif

@endsection
