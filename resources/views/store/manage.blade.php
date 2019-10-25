@extends('layouts.app')

@section('content')
<div class="container">

    @foreach ($clothes as $cloth)
    <a href="{{ route('clothes.show',$cloth->id) }}">
        <p>{{ $cloth->name }}</p>
        <img src="/storage/{{ $cloth->image }}">
        <p>{{ $cloth->price }}</p>
        <p>{{ $cloth->stock }}</p>
        <p>Store Name: {{ $cloth->store->name }}</p>
    </a>
    <a href="{{ route('clothes.edit',$cloth->id) }}">Update Clothes</a>

    <form action="{{ route('clothes.destroy',$cloth->id) }}" method="post">
        @method('delete')
        @csrf
        <input class="btn btn-default" type="submit" value="Delete Clothes" />
    </form>
    @endforeach

    <a href="{{ route('clothes.create') }}">Add Clothes</a>
    <a href="{{ route('store.edit',$store->id) }}">Update Store</a>

    <form action="{{ route('store.destroy',$store->id) }}" method="post">
        @method('delete')
        @csrf
        <input class="btn btn-default" type="submit" value="Delete Store" />
    </form>

</div>
@endsection
