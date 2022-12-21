@extends('layouts.app')

@section('content')
    <!-- Password Confirm Start -->
    <div class="container-fluid">
        <div class="row h-100 align-items-center justify-content-center" style="min-height: 100vh;">
            <div class="col-12 col-sm-8 col-md-6 col-lg-5 col-xl-4">
                <div class="bg-light rounded p-3 p-sm-4 my-4 mx-3">
                    <div class="d-flex align-items-center justify-content-center mb-3">
                        <a href="{{ url('/') }}" class="">
                            <img src="{{ asset('images/logo.png') }}" alt="" height="55" width="150">
                        </a>
                        <p>
                            {{ __('Please confirm your password before continuing.') }}
                        </p>
                    </div>

                    <form method="POST" action="{{ route('password.confirm') }}">
                        @csrf

                        <div class="form-floating mb-3">
                            <input type="password" class="form-control @error('password') is-invalid @enderror"
                                name="password" placeholder="Password" id="floatingPassword" required
                                autocomplete="current-password">
                            <label for="floatingPassword">Password</label>

                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Confirm Password') }}
                                </button>

                                @if (Route::has('password.request'))
                                    <a class="btn btn-link" href="{{ route('password.request') }}">
                                        {{ __('Forgot Your Password?') }}
                                    </a>
                                @endif
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- Password Confirm End -->
@endsection
