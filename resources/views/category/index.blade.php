@extends('layouts.app')

@section('content')
<div class="container">

    @foreach ($categories as $category)
    <div class="container category-index-container">
            <img src="/storage/{{ $category->image }}">
            <a  class="btn btn-primary" href='{{ route('category.edit',$category->id) }}'>Update {{ $category->name }}</a>
            {{-- <a href='{{ route('category.destory',$category->id) }}'>Delete {{ $category->name }}</a> --}}
            <p>{{ $category->name }}</p>
            <form action="{{ route('category.destroy',$category->id) }}" method="post">
                @method('delete')
                @csrf
                <input class="btn btn-danger" id="delBtn" type="submit" value="Delete"/>
            </form>
    </div>
    @endforeach
</div>
<div class="addBtn">
    <a class=" btn btn-success" href='{{ route('category.create') }}'>Add Category</a>
</div>
@endsection
