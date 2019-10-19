@extends('layouts.app')

@section('content')
<div class="container">

    @foreach ($categories as $category)
        <p>{{ $category->name }}</p>
        <img src="/storage/{{ $category->image }}">
        <a href='#'>Update {{ $category->name }}</a>
        <a href='#'>Delete {{ $category->name }}</a>
    @endforeach

</div>
@endsection
