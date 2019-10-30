@extends('layouts.app')

@section('content')
    @foreach ($carts as $cart)
    <p>{{ $cart->name }}</p>
    <p>{{ $cart->price }}</p>
    <p>{{ $cart->description }}</p>
    {{-- <p></p> --}}
    <img src="/storage/{{ $cart->image }}" alt="">
    <p>{{ $cart->store->name }}</p>
    <p>{{ $cart->quantity }}</p>
    {{-- <p>{{ $cart->name }}</p> --}}

    <form method="post" action="{{ route('cart.update', $cart->id) }}" enctype="multipart/form-data">
        @csrf
        @method('PATCH')
        <div class="col-md-6">
            <input id="quantity" type="number" class="form-control @error('quantity') is-invalid @enderror" name="quantity" value="{{ $cart->quantity }}" required autocomplete="quantity" autofocus>

            @error('quantity')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>

        <div class="form-group row mb-0">
            <div class="col-md-6 offset-md-4">
                <button type="submit" class="btn btn-primary">
                    {{ __('Update Quantity') }}
                </button>
            </div>
        </div>
    </form>

    <form action="{{ route('cart.destroy',$cart->id) }}" method="post">
        @method('delete')
        @csrf
        <input class="btn btn-default" type="submit" value="Delete" />
    </form>

    @endforeach

    <form action="{{ route('cart.checkout') }}" method="post">
        @method('delete')
        @csrf
        <input class="btn btn-default" type="submit" value="Checkout" />
    </form>
@endsection
