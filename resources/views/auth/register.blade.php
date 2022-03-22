@extends('layouts.app')

@section('content')
<div class="container">
    
    <div class="row mt-5 px-3 px-md-0 row-register-login " style="height: 70vh;">
        {{-- LEFT SIDE --}}
        <div class="col-md-6 d-none d-md-block rounded-start" style="background-color: #a7c3f1; position: relative;">
            <h1 class="text-center text-white mt-4">Welcome to Forumify</h1>
            <img class="img-fluid ms-5 " src="{{ asset('images/auth.svg') }}" alt="" style="width: 70%; position:absolute; bottom:0">
        </div>

        {{-- RIGHT SIDE --}}
        <div class="col-md-6 bg-white sm-rounded rounded-end ">
            <h3 class="text-center mt-3"><strong>Register</strong></h3>
            <p class="text-center mt-2 ">Create an account to join our forum</p>
            <img class=" img-fluid d-block mx-auto d-md-none " src="{{ asset('images/auth.svg') }}" style="height: 15%" alt="" >
            <form method="POST" class="mt-5 " action="{{ route('register') }}">
                @csrf

                <div class="row mb-3">
                    <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('Name') }}</label>

                    <div class="col-md-6">
                        <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                        @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="row mb-3">
                    <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Email Address') }}</label>

                    <div class="col-md-6">
                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="row mb-3">
                    <label for="password" class="col-md-4 col-form-label text-md-end">{{ __('Password') }}</label>

                    <div class="col-md-6">
                        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                        @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="row mb-3">
                    <label for="password-confirm" class="col-md-4 col-form-label text-md-end">{{ __('Confirm Password') }}</label>

                    <div class="col-md-6">
                        <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                    </div>
                </div>

                <div class="row mb-0">
                    
                    <div class="col-md-6 offset-md-4">
                        <button type="submit" class="btn btn-primary">
                            {{ __('Register') }}
                        </button>
                        <p class="mt-3 "><strong>already have an account? <a href="{{ route('login') }}">Login</a></strong></p>
                    </div>
                    
                    
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
