@extends('layouts.dash')

@section('content')
    <!-- User Stats Start -->
    <div class="container-fluid pt-4 px-4">
        <div class="row g-4">
            <div class="col-sm-6 col-xl-6">
                <div class="bg-light rounded d-flex align-items-center p-4">
                    <i class="fa fa-wallet fa-3x text-primary"></i>
                    <div class="ms-4">
                        <p class="mb-2">Total Earnings</p>
                        <h6 class="mb-0">@money(Auth::user()->total_earnings)</h6>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-xl-6">
                <div class="bg-success text-light rounded d-flex align-items-center p-4">
                    <i class="fa fa-money-bill-wave fa-3x"></i>
                    <div class="ms-4">
                        <h2 class="mb-0 text-light">Cashout</h2>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- User Stats End -->
@endsection
