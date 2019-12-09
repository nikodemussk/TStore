@extends('layouts.app')


@section('content')
{{-- <div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    You are logged in!
                </div>
            </div>
        </div>
    </div>
</div> --}}

<h1>Welcome to TStore</h1>
<p>Our Clothes Categories:</p>

@foreach ($categories as $category)
<div class="row container category-container">
    <div class="col">
        <a href="{{ route('category.show',$category->id) }}">
            <p class="btn btn-secondary">{{ $category->name }}</p>
            <img src="/storage/{{ $category->image }}">
        </a>
</div>
</div>

@endforeach


@endsection
