@extends('layouts.dash')

@section('content')
    @if ($is_new_user)
        <!-- Welcome Start -->
        <div class="container-fluid pt-4 px-4">
            <div class="row">
                <div class="col-sm-12">
                    <div class="alert alert-success alert-dismissible show fade mb-0">
                        You have successfully completed the task of joining🎯 <b>{{ config('app.name') }}</b> as such, you
                        have earned @money(2000) welcome bonus and @money(300) daily login🎯 bonus.
                        Welcome on board, {{ Auth::user()->full_name }}.
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                </div>
            </div>
        </div>
        <!-- Welcome End -->
    @endif

    <!-- User Stats Start -->
    <div class="container-fluid pt-4 px-4">
        <div class="row g-4">
            <div class="col-sm-6 col-xl-3">
                <div class="bg-light rounded d-flex align-items-center justify-content-between p-4">
                    <i class="fa fa-users fa-3x text-primary"></i>
                    <div class="ms-2">
                        <p class="mb-2">Referrals</p>
                        <h6 class="mb-0">{{ Auth::user()->referrals->count() }}</h6>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-xl-3">
                <div class="bg-light rounded d-flex align-items-center justify-content-between p-4">
                    <i class="fa fa-tasks fa-3x text-primary"></i>
                    <div class="ms-2">
                        <p class="mb-2">Task Earnings</p>
                        <h6 class="mb-0">@money(1234)</h6>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-xl-3">
                <div class="bg-light rounded d-flex align-items-center justify-content-between p-4">
                    <i class="fa fa-user-plus fa-3x text-primary"></i>
                    <div class="ms-2">
                        <p class="mb-2">Referral Earnings</p>
                        <h6 class="mb-0">$1234</h6>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-xl-3">
                <div class="bg-light rounded d-flex align-items-center justify-content-between p-4">
                    <i class="fa fa-wallet fa-3x text-primary"></i>
                    <div class="ms-2">
                        <p class="mb-2">Total Earnings</p>
                        <h6 class="mb-0">$1234</h6>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- User Stats End -->


    <!-- Leaderboard Start -->
    <div class="container-fluid pt-4 px-4">
        <div class="bg-light text-center rounded p-4">
            <div class="d-flex align-items-center justify-content-between mb-4">
                <h6 class="mb-0">Leaderboard</h6>
            </div>
            <div id="chart-leaderboard"></div>
        </div>
    </div>
    <!-- Leaderboard End -->
@endsection
