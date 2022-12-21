@extends('layouts.app')

@section('content')
    <!-- Reset Start -->
    <div class="container-fluid">
        <div class="row h-100 align-items-center justify-content-center" style="min-height: 100vh;">
            <div class="col-12 col-sm-8 col-md-6 col-lg-5 col-xl-4">
                <div class="bg-light rounded p-3 p-sm-4 my-4 mx-3">
                    <div class="d-flex align-items-center justify-content-center mb-3">
                        <a href="{{ url('/') }}" class="">
                            <img src="{{ asset('images/logo.png') }}" alt="" height="55" width="150">
                        </a>
                    </div>
                    <form method="POST" action="{{ route('password.update') }}">
                        @csrf

                        <input type="hidden" name="token" value="{{ $token }}">

                        <div class="form-floating mb-3">
                            <input type="email" class="form-control @error('email') is-invalid @enderror" name="email"
                                placeholder="Email" value="{{ old('email') }}" id="floatingEmail" required
                                autocomplete="email">
                            <label for="floatingEmail">Email address</label>

                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-floating mb-3">
                            <input type="password" class="form-control @error('password') is-invalid @enderror"
                                name="password" placeholder="Password" id="floatingPassword" required
                                autocomplete="new-password">
                            <label for="floatingPassword">Password</label>

                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-floating mb-3">
                            <input type="password" class="form-control" name="password_confirmation"
                                placeholder="Confirm Password" id="floatingConfirmPass" required
                                autocomplete="new-password">

                            <label for="floatingConfirmPass">Confirm Password</label>
                        </div>

                        <button type="submit" class="btn btn-primary py-2 w-100 mb-4">{{ __('Reset Password') }}</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- Reset End -->
@endsection
