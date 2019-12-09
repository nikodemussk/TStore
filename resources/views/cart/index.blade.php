@extends('layouts.app')

@section('content')

    <h2 class="container">{{Auth::user()->name}}'s Cart</h2>

    @foreach ($carts as $cart)
    <div class="pb-5">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 p-5 bg-white rounded shadow-sm mb-5">
                <div class="table-responsive">
                    <table class="table">
                        <tbody>
                            <tr>
                            <th scope="row" class="border-0">
                                <div class="p-2">
                                    <img src="/storage/{{ $cart->image }}" alt="" width="70" class="img-fluid rounded shadow-sm">
                                </th>
                            </div>
                            <td class="border-0 align-middle"><strong>{{ $cart->name }}</strong></td>
                            <td class="border-0 align-middle"><strong>{{ $cart->store->name }}</strong></td>
                            <td class="border-0 align-middle"><strong>{{ $cart->price }}</strong></td>
                            <td class="border-0 align-middle"><strong>{{ $cart->quantity }}</strong></td>    
                            {{-- <p>{{ $cart->name }}</p> --}}

                            <td class="border-0 align-middle">
                            <div class="quantity_count">
                                    <form method="post" action="{{ route('cart.update', $cart->id) }}" enctype="multipart/form-data">
                                        @csrf
                                        @method('PATCH')
                                        <div class="col-md">
                                            <input id="quantity" type="number" class="form-control @error('quantity') is-invalid @enderror" name="quantity" value="{{ $cart->quantity }}" required autocomplete="quantity" autofocus>

                                            @error('quantity')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>

                                        <div class="form-group row mb-0">
                                            <div class="col-md">
                                                <button type="submit" class="btn btn-primary">
                                                    {{ __('Update Quantity') }}
                                                </button>
                                            </div>
                                        </div>
                                    </form>
                                    </div>
                                    </td>
                                    
                                    <td class="border-0 align-middle">
                                        <div class=delete_btn>
                                    <form action="{{ route('cart.destroy',$cart->id) }}" method="post">
                                        @method('delete')
                                        @csrf
                                        <input class="btn btn-default" type="submit" value="Delete" />
                                    </form>
                                    </div>
                                    </td>
                                    
                                </div>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        </div>
    </div>

    @endforeach
    <div class="checkout_btn">
        <form action="{{ route('cart.checkout') }}" method="post">
            @method('delete')
            @csrf
            <input class="btn btn-success" type="submit" value="Checkout" />
        </form>
    </div>
    
@endsection
