@extends('layouts.app')

@section('content')

<h1>Transaction</h1>
@foreach ($transactions as $transaction)
<div class="container transaction">
    <div class="user-detail">
        <h5 class="user-name">by: <strong>{{ $transaction->user->name }}</strong></h5>
        <h5>Transaction on <strong>{{ $transaction->created_at }}</strong></h5>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-sm">
                <p>{{ $transaction->clothes->name }}</p>
            </div>
            <div class="col-sm">
                <p>{{ $transaction->clothes->price }}</p>
            </div>
            <div class="col-sm">
                <p>Quantity: {{ $transaction->quantity }}</p>
            </div>
            <div class="col-sm">
                <p>Subtotal: {{ $transaction->clothes->price * $transaction->quantity }}</p>
            </div>
        </div>
    </div>
    
</div>
    
@endforeach

@endsection
