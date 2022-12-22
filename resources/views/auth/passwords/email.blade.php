@extends('layouts.auth')

@section('content')
    <!-- Email Start -->
    <div class="container-fluid">
        <div class="row h-100 align-items-center justify-content-center" style="min-height: 100vh;">
            <div class="col-12 col-sm-8 col-md-6 col-lg-5 col-xl-4">
                <div class="bg-light rounded p-3 p-sm-4 my-4 mx-3">
                    <div class="d-flex align-items-center justify-content-center mb-3">
                        <a href="{{ url('/') }}" class="">
                            <img src="{{ asset('images/logo.png') }}" alt="" height="55" width="150">
                        </a>
                    </div>
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <form method="POST" action="{{ route('password.email') }}">
                        @csrf

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

                        <button type="submit"
                            class="btn btn-primary py-2 w-100 mb-4">{{ __('Send Password Reset Link') }}</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- Email End -->
@endsection
