@extends('layouts.app')

@section('content')
<div class="container">

    @foreach ($clothes as $cloth)
    <a href="{{ route('clothes.show',$cloth->id) }}">
        <p>{{ $cloth->name }}</p>
        <img src="/storage/{{ $cloth->image }}">
        <p>{{ $cloth->price }}</p>
        <p>{{ $cloth->stock }}</p>
    </a>
    @endforeach

</div>
@endsection
