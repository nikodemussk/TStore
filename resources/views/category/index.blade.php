@extends('layouts.app')

@section('content')
<div class="container">
    <a href='{{ route('category.create') }}'>Add Category</a>
    @foreach ($categories as $category)
        <p>{{ $category->name }}</p>
        <img src="/storage/{{ $category->image }}">
        <a href='{{ route('category.edit',$category->id) }}'>Update {{ $category->name }}</a>
        {{-- <a href='{{ route('category.destory',$category->id) }}'>Delete {{ $category->name }}</a> --}}
        <form action="{{ route('category.destroy',$category->id) }}" method="post">
            @method('delete')
            @csrf
            <input class="btn btn-default" type="submit" value="Delete" />
        </form>
    @endforeach

</div>
@endsection
