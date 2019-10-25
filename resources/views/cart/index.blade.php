@extends('layouts.app')

@section('content')
    @foreach ($carts as $cart)
    <p>{{ $cart->name }}</p>
    <p>{{ $cart->price }}</p>
    <p>{{ $cart->description }}</p>
    <p>{{ $cart->image }}</p>
    <p>{{ $cart->name }}</p>
    <p>{{ $cart->name }}</p>
    <p>{{ $cart->name }}</p>
    @endforeach

@endsection
