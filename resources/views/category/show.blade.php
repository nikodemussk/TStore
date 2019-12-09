@extends('layouts.app')

@section('content')
<div class="search-container">
    <form class="float-right" action="{{route('clothes.search')}}" method="GET">
        <input class="search" type="text" name="searchData" placeholder="Search">
        <!-- <input type="submit"> -->
    </form>
</div>
<br><br><br>
<div class="container row pl-6 pr-6">
    <div class="row">
        @foreach ($clothes as $cloth)
        @if ($cloth->stock > 0)
        <div class="col-md-3">
            <div class="card2 mb-4 shadow">
                <a href="{{ route('clothes.show',$cloth->id) }}">
                    <div>
                    <img src="/storage/{{ $cloth->image }}" class="card-clothes">
                    </div>
                    <div class="card-body2">
                        <div class="card-text pt-3">
                            <p class="text-center"><b>{{ $cloth->name }}</b></p>
                            <p class="text-center"><b>Store Name: </b>{{ $cloth->store->first()->name }}</p>
                            <p class="text-center">Rp. {{ $cloth->price }}</p>
                        </div>
                    </div>
                </a>
            </div>
        </div>
        @endif
        @endforeach
    </div>
</div>
@endsection
