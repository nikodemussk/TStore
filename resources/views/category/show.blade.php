@extends('layouts.app')

@section('content')
<div class="container">

    @foreach ($$clothes as $cloth)
        <p>{{ $cloth->name }}</p>
        {{-- <img src="/storage/{{ $cloth->image }}"> --}}
    @endforeach

</div>
@endsection
