@extends('layouts.app')

@section('content')
<div class="container">

        <p>{{ $clothes->name }}</p>
        <p>{{ $clothes->category }}</p>
        <img src="/storage/{{ $clothes->image }}">
        <p>{{ $clothes->price }}</p>
        <p>{{ $clothes->stock }}</p>
        <p>{{ $clothes->description }}</p>
        {{-- <p>{{ $clothes->store->name }}</p> --}}

</div>

<form method="post" action="{{ route('cart.store', $clothes->id) }}" enctype="multipart/form-data">
    @csrf
    <div class="col-md-6">
        <input id="quantity" type="number" class="form-control @error('quantity') is-invalid @enderror" name="quantity" value="{{ $clothes->quantity }}" required autocomplete="quantity" autofocus>

        @error('quantity')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>

    <div class="form-group row mb-0">
        <div class="col-md-6 offset-md-4">
            <button type="submit" class="btn btn-primary">
                {{ __('Add to Cart') }}
            </button>
        </div>
    </div>
</form>
@endsection
