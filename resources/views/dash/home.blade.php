@extends('layouts.dash')

@section('content')
    @if ($is_new_user)
        <!-- Welcome Start -->
        <div class="container-fluid pt-4 px-4">
            <div class="row">
                <div class="col-sm-12">
                    <div class="alert alert-success alert-dismissible show fade mb-0">
                        You have successfully completed the task of joining🎯 <b>{{ config('app.name') }}</b> as such, you
                        have earned @money(config('myglobals.welcome_bonus')) welcome bonus.
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
                <div class="bg-light rounded d-flex align-items-center p-4">
                    <i class="fa fa-users fa-3x text-primary"></i>
                    <div class="ms-4">
                        <p class="mb-2">Referrals</p>
                        <h6 class="mb-0">{{ Auth::user()->referrals->count() }}</h6>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-xl-3">
                <div class="bg-light rounded d-flex align-items-center p-4">
                    <i class="fa fa-tasks fa-3x text-primary"></i>
                    <div class="ms-4">
                        <p class="mb-2">Task Earnings</p>
                        <h6 class="mb-0">@money(Auth::user()->task_earnings)</h6>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-xl-3">
                <div class="bg-light rounded d-flex align-items-center p-4">
                    <i class="fa fa-user-plus fa-3x text-primary"></i>
                    <div class="ms-2">
                        <p class="mb-2">Referral Earnings</p>
                        <h6 class="mb-0">@money(Auth::user()->referral_earnings)</h6>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-xl-3">
                <div class="bg-light rounded d-flex align-items-center p-4">
                    <i class="fa fa-wallet fa-3x text-primary"></i>
                    <div class="ms-4">
                        <p class="mb-2">Total Earnings</p>
                        <h6 class="mb-0">@money(Auth::user()->total_earnings)</h6>
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

@section('script')
    <script src="{{ asset('js/lib/apexcharts/apexcharts.min.js') }}"></script>
    <script>
        var optionsCustom = {
            series: [{
                name: 'Earnings',
                data: [{
                        x: "Ruth O\'Ryan",
                        y: 13300
                    },
                    {
                        x: "Eric Jonathan",
                        y: 10000
                    },
                    {
                        x: "Enya Larson",
                        y: 11600
                    },
                    {
                        x: "Chistina Vaughan",
                        y: 16000
                    },
                    {
                        x: "John Ilves",
                        y: 14300
                    },
                    {
                        x: "Jacy Hawkins",
                        y: 15200
                    },
                    {
                        x: "Keth Stephens",
                        y: 11800
                    }
                ]
            }],
            chart: {
                type: "bar",
                height: 350
            },
            plotOptions: {
                bar: {
                    horizontal: false,
                    distributed: true
                }
            },
            dataLabels: {
                enabled: false
            },
            legend: {
                show: false
            }
        };

        var chartLeaderBoard = new ApexCharts(document.querySelector("#chart-leaderboard"), optionsCustom);

        chartLeaderBoard.render();
    </script>
@endsection
