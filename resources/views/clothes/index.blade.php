@extends('layouts.app')

@section('content')
<div class="container">

    @foreach ($clothes as $cloth)
    @if ($cloth->stock > 0)
    <a href="{{ route('clothes.show',$cloth->id) }}">
        <p>{{ $cloth->name }}</p>
        <img src="/storage/{{ $cloth->image }}">
        <p>{{ $cloth->price }}</p>
        <p>{{ $cloth->stock }}</p>
        <p>Store Name: {{ $cloth->store->first()->name }}</p>
    </a>
    @endif
    @endforeach

    <div>
        {{$clothes->appends(request()->input)->links()}}
    </div>
</div>
@endsection
