@extends('layouts.app')

@section('content')
<div class="container">
   
    @foreach ($categories as $category)
        <p>{{ $category->name }}</p>
        <img src="/storage/{{ $category->image }}">
    @endforeach

</div>
@endsection
