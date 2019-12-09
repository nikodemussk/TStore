@extends('layouts.app')

@section('content')
<form method="POST" action="{{ route('store.store') }}" enctype="multipart/form-data">
    @csrf
    <h2 class="text-center py-3 pt-3">{{ __('Create Store') }}</h2>
<br>
<div class="form-group row justify-content-center">
    <label for="name" class="col-md-1 col-form-label text-md-left">{{ __('Name') }}</label>

    <div class="col-md-2">
        <input id="name" placeholder="Store Name" type="text" class="form-control-new @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

        @error('name')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
</div>

<div class="form-group row justify-content-center">
    <label for="address" class="col-md-1 col-form-label text-md-left">{{ __('Address') }}</label>

    <div class="col-md-2">
        <textarea placeholder="Store Address" id="address" type="text" class="form-control-new-2 @error('address') is-invalid @enderror" name="address" value="{{ old('address') }}" required autocomplete="description" autofocus>
        </textarea>
        @error('address')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
</div>


<div class="form-group row justify-content-center">
        <label for="description" class="col-md-1 col-form-label text-md-left">{{ __('Description') }}</label>

        <div class="col-md-2">
            <textarea  placeholder="Store Description" id="description" type="text" class="form-control-new-2 @error('description') is-invalid @enderror" name="description" value="{{ old('description') }}" required autocomplete="description" autofocus>
            </textarea>
            @error('description')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
    </div>


<div class="form-group row justify-content-center">
    <label for="image" class="col-md-1 col-form-label text-md-left">{{ __('Image') }}</label>

    <div class="col-md-2">
        <input id="image" type="file" class="form-control-new @error('image') is-invalid @enderror" name="image" value="{{ old('image') }}" autocomplete="image" autofocus>

        @error('image')
        <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
    </div>

    <div class="form-group row mb-0 justify-content-center">
        <div class="pt-3">
            <button type="submit" class="btn-new btn-primary-2">
                {{ __('Create Store') }}
            </button>
        </div>
    </div>
</form>

@endsection
