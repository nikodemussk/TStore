@extends('layouts.app')

@section('content')
<div class="container">
    <a href='{{ route('category.create') }}'>Add Category</a>
    @foreach ($categories as $category)
        <p>{{ $category->name }}</p>
        <img src="/storage/{{ $category->image }}">
        <a href='{{ route('category.edit',$category->id) }}'>Update {{ $category->name }}</a>
        <a href='{{ route('category.edit',$category->id) }}'>Delete {{ $category->name }}</a>
    @endforeach

</div>
@endsection
