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
@endsection
