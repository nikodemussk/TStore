@extends('layouts.app')

@section('content')
<div class="container">

        <p>{{ $cloth->name }}</p>
        <p>{{ $cloth->category }}</p>
        <img src="/storage/{{ $cloth->image }}">
        <p>{{ $cloth->price }}</p>
        <p>{{ $cloth->stock }}</p>
        <p>{{ $cloth->description }}</p>

</div>

<form method="post" action="{{ route('clothes.update',$clothes->id) }}" enctype="multipart/form-data">
    <div class="col-md-6">
        <input id="quantity" type="number" class="form-control @error('quantity') is-invalid @enderror" name="quantity" value="{{ $clothes->quantity }}" required autocomplete="quantity" autofocus>

        @error('quantity')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
</form>
@endsection
