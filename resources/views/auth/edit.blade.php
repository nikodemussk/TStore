@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center pt-3">
        <div class="col-md-8">
            <div class="">

            <h2 class="text-center py-3 pt-3">Update {{ Auth::user()->name }} </h2>
                <div class="pt-3">
                    <form method="POST" action="{{ route('user.update',$user->id) }}" enctype="multipart/form-data">
                        @csrf
                        @method('PATCH')

                        <div class="form-group row justify-content-center">
                            <label for="name" class="col-md-3 col-form-label text-md-left">{{ __('Name') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control-new @error('name') is-invalid @enderror" name="name" value="{{ $user->name }}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row justify-content-center">
                            <label for="gender" class="col-md-3 col-form-label text-md-left">{{ __('Gender') }}</label>

                            <div class="col-md-6 d-inline">
                                @if ($user->gender == "male")
                                    <input checked class="form-control-new @error('gender') is-invalid @enderror d-inline"  type="radio" id="gender" value="male" name="gender" value="{{ $user->gender }}" required autocomplete="gender" autofocus style="width: auto; height:auto">
                                    <p class="d-inline">Male</p>
                                    <input class="form-control-new @error('gender') is-invalid @enderror d-inline" type="radio" id="gender" value="female" name="gender" value="{{ $user->gender }}" required autocomplete="gender" autofocus style="width: auto; height:auto">
                                    <p class="d-inline">Female</p>
                                @else
                                    <input class="form-control-new @error('gender') is-invalid @enderror d-inline"  type="radio" id="gender" value="male" name="gender" value="{{ $user->gender }}" required autocomplete="gender" autofocus style="width: auto; height:auto">
                                    <p class="d-inline">Male</p>
                                    <input checked class="form-control-new @error('gender') is-invalid @enderror d-inline" type="radio" id="gender" value="female" name="gender" value="{{ $user->gender }}" required autocomplete="gender" autofocus style="width: auto; height:auto">
                                    <p class="d-inline">Female</p>
                                @endif

                                @error('gender')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row justify-content-center">
                            <label for="email" class="col-md-3 col-form-label text-md-left">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control-new @error('email') is-invalid @enderror" name="email" value="{{ $user->email }}" required autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row justify-content-center">
                                <label for="old-password" class="col-md-3 col-form-label text-md-left">{{ __('Old Password') }}</label>

                                <div class="col-md-6">
                                    <input id="old-password" type="password" class="form-control-new @error('old-password') is-invalid @enderror" name="old-password" required autocomplete="old-password">

                                    @error('old-password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                        <div class="form-group row justify-content-center">
                            <label for="password" class="col-md-3 col-form-label text-md-left">{{ __('New Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control-new @error('password') is-invalid @enderror" name="password" autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row justify-content-center">
                            <label for="password-confirm" class="col-md-3 col-form-label text-md-left">{{ __('Confirm Password') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control-new" name="password_confirmation" autocomplete="new-password">
                            </div>
                        </div>

                        <div class="form-group row justify-content-center">
                            <label for="address" class="col-md-3 col-form-label text-md-left">{{ __('Address') }}</label>

                            <div class="col-md-6">
                            <textarea rows="4" cols="50" id="address" class="form-control-new-2 @error('address') is-invalid @enderror" name="address" value="" required autocomplete="address" autofocus>{{ $user->address }}</textarea>
                                @error('address')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
<!-- 
                        <div class="form-group row">
                            <label for="category_id" class="col-md-4 col-form-label text-md-right">{{ __('Role') }}</label>

                            <div class="col-md-6">

                        <select name="role" id="role" class="form-control @error('role') is-invalid @enderror" name="role" required autocomplete="role" autofocus>
                            <option value="member">Member</option>
                            <option value="admin">Admin</option>
                            <option value="superadmin">Super Admin</option>
                        </select>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="image" class="col-md-4 col-form-label text-md-right">{{ __('Image') }}</label>

                            <div class="col-md-6">
                                <input id="image" type="file" class="form-control @error('image') is-invalid @enderror" name="image" value="{{ old('image') }}" autocomplete="image" autofocus>

                                @error('image')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div> -->

                        <div class="form-group row mb-0 justify-content-center">
                            <div class="text-center pt-3">
                                <button type="submit" class="btn-new btn-primary-2">
                                    {{ __('Update Profile') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

</div>
@endsection
