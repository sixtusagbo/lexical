@extends('layouts.auth')

@section('content')
    <!-- Sign Up Start -->
    <div class="container-fluid">
        <div class="row h-100 align-items-center justify-content-center" style="min-height: 100vh;">
            <div class="col-12 col-sm-8 col-md-6 col-lg-5 col-xl-4">
                <div class="bg-light rounded p-3 p-sm-4 my-4 mx-3">
                    <div class="d-flex align-items-center justify-content-between mb-3">
                        <a href="{{ url('/') }}" class="">
                            <img src="{{ asset('images/logo.png') }}" alt="" height="55" width="150">
                        </a>
                        <h3>Sign Up</h3>
                    </div>
                    <p>Don't have coupon code <a href="vendors">purchase here</a></p>
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="row mb-3 gx-1">
                            <div class="col">
                                <div class="form-floating">
                                    <input type="text" class="form-control" name="first_name" id="floatingFname"
                                        placeholder="John" value="{{ old('first_name') }}" required>
                                    <label for="floatingFname">First
                                        Name</label>
                                </div>
                            </div>
                            <div class="col">
                                <div class="form-floating">
                                    <input type="text" class="form-control" name="last_name" placeholder="Last Name"
                                        id="floatingLname" value="{{ old('last_name') }}" required>
                                    <label for="floatingLname">Last
                                        Name</label>
                                </div>
                            </div>
                        </div>

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

                        <div class="form-floating mb-3">
                            <input type="number" id="phone_number" class="form-control" placeholder="Phone number"
                                id="floatingPhone" name="phone_number" value="{{ old('phone_number') }}" required />
                            <label for="floatingPhone">Phone Number</label>
                        </div>

                        <div class="form-floating mb-3">
                            <input type="text" class="form-control @error('coupon_code') is-invalid @enderror"
                                name="coupon_code" placeholder="Coupon Code" required id="floatingCoupon"
                                style="-webkit-text-security: square;">
                            <label for="floatingCoupon">Coupon Code</label>
                            @error('coupon_code')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="d-flex align-items-center justify-content-between mb-4">
                            <div class="form-check">
                                <input type="checkbox" class="form-check-input" id="termsCheck">
                                <label class="form-check-label">I accept <a href="">Terms</a>
                                    &amp; <a href="">Privacy Policy</a></label>
                            </div>
                        </div>

                        <button type="submit" class="btn btn-primary py-2 w-100 mb-4">Sign Up</button>
                        <p class="text-center mb-0">Already have an Account? <a href="{{ route('login') }}">Sign In</a></p>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- Sign Up End -->
@endsection
