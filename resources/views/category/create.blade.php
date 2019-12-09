@extends('layouts.app')

@section('content')
<form method="POST" action="{{ route('category.store') }}" enctype="multipart/form-data">
    @csrf
<div class="container-fluid ml-4">
<div class="form-group row">
    <label for="name" class="col-md-1 col-form-label text-md-left">{{ __('Name') }}</label>

    <div class="col-md-3">
        <input id="name" placeholder="Category Name" type="text" class="form-control-new @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

        @error('name')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
</div>

<div class="form-group row">
    <label for="image" class="col-md-1 col-form-label text-md-left">{{ __('Image') }}</label>

    <div class="col-md-6">
        <input id="image" type="file" class="form-control-new @error('image') is-invalid @enderror" name="image" value="{{ old('image') }}" autocomplete="image" autofocus>

        @error('image')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
</div>

<div class="">
    <div class="pr-6">
        <button type="submit" class="btn-new btn-primary-2">
            {{ __('Add Category') }}
        </button>
    </div>
</div>
</div>
</form>

@endsection
