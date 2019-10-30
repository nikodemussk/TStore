@extends('layouts.app')

@section('content')

<h1>Transaction</h1>
@foreach ($transactions as $transaction)
    <p>Transaction on {{ $transaction->created_at }}</p>
    <p>By: {{ $transaction->user->name }}</p>
    <p>{{ $transaction->clothes->name }}</p>
    <p>{{ $transaction->clothes->price }}</p>
    <p>Quantity: {{ $transaction->quantity }}</p>
    <p>Subtotal: {{ $transaction->clothes->price * $transaction->quantity }}</p>
@endforeach

@endsection
