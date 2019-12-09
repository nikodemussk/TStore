@extends('layouts.app')

@section('content')
<div class="container-fluid">
         <div class="pl-5">
            <h2 class="pb-4">{{ $store->name }}</h2>
         </div>

         <div>
            <form action="{{  route('clothes.create') }}" class="float-right mt--1 pr-4">
                   <input class="btn-new btn-primary-2" type="submit" value="Add Item" />
            </form>
         </div>
</div>

<div class="container row pl-6 pr-6">
<div class="row">
        @foreach ($clothes as $cloth)
        <div class="col-md-3 pb-3">
            <div class="card2 mb-4 shadow h-100">
                <a href="{{ route('clothes.show',$cloth->id) }}">
                    <div>
                    <img src="/storage/{{ $cloth->image }}" class="card-clothes">
                    </div>
                    <div class="card-body2 pl-2 pr-2">
                        <div class="card-text pt-3">
                            <p class="text-center"><b>{{ $cloth->name }}</b></p>
                            <p class="text-center">Stock: {{ $cloth->stock }} item(s)</p>
                            <p class="text-center">{{ $cloth->description }}</p>
                            <p class="text-center">Rp. {{ $cloth->price }}</p>  
                        </div>
                    </div>
                </a>
                <div class="text-center">
                    <div>
                        <form action="{{ route('clothes.edit',$cloth->id) }}">
                            <input class="btn-new btn-primary-2" type="submit" value="Update Item" />
                        </form>
                    </div>

                    <div class="pt-2">
                        <form action="{{ route('clothes.destroy',$cloth->id) }}" method="post">
                            @method('delete')
                            @csrf
                            <input class="btn-new btn-primary-2 bg-danger text-white" type="submit" value="Delete Item" />
                        </form>
                    </div>
                </div>
            </div>
            
        
        </div>
        @endforeach
    </div>
</div>
    <div class="pt-5">
        <div class="text-center">
            <form action="{{  route('store.edit',$store->id) }}" class="">
                   <input class="btn-new btn-primary-2" type="submit" value="Update Store" />
            </form>
         </div>
         <div class="text-center pt-2">
         <form action="{{ route('store.destroy',$store->id) }}" method="post">
            @method('delete')
            @csrf
            <input class="btn-new btn-primary-2 bg-danger text-white" type="submit" value="Delete Store" />
        </form>
         </div>
    </div>
@endsection
