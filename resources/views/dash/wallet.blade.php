@extends('layouts.dash')

@section('content')
    <!-- User Stats Start -->
    <div class="container-fluid pt-4 px-4">
        <div class="row g-4">
            <div class="col-sm-6 col-xl-3">
                <div class="bg-light rounded d-flex align-items-center p-4">
                    <i class="fa fa-wallet fa-3x text-primary"></i>
                    <div class="ms-4">
                        <p class="mb-2">Total Earnings</p>
                        <h6 class="mb-0">@money(Auth::user()->total_earnings)</h6>
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

    @if (config('myglobals.cashout_day') || config('myglobals.referral_cashout_day'))
        {{-- Cashout period --}}
        @if (config('myglobals.referral_cashout_day'))
            {{-- Referral cashout period --}}
            @if (Auth::user()->referral_earnings > 0)
                {{-- Eligible to withdraw --}}
                <div class="container-fluid pt-4 px-4">
                    <div class="row g-4" id="cashOutSection">
                        <div class="col-12">
                            <div class="bg-light text-light rounded p-3">
                                <h6 class="mb-3">Update Password</h6>
                                <div class="alert alert-primary alert-dismissible show fade">
                                    <h4 class="alert-heading">Important!</h4>
                                    <p>Account name must match your full name - <b>John Stones</b></p>
                                    <button type="button" class="btn-close" data-bs-dismiss="alert"
                                        aria-label="Close"></button>
                                </div>
                                <form method="post" class="form" id="cashOutForm"
                                    action="{{ route('referralCashout') }}">
                                    @csrf
                                    <div class="row">
                                        <div class="col-md-6 col-12">
                                            <div class="form-group">
                                                <label for="dateInputElement">Date</label>
                                                <input type="text" id="dateInputElement" class="form-control"
                                                    value="{{ Carbon\Carbon::today()->toFormattedDateString() }}" readonly>
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-12">
                                            <label for="amount">Amount</label>
                                            <div class="input-group">
                                                <div class="input-group-text" id="currency-symbol">
                                                    {!! config('myglobals.currency') !!}
                                                </div>
                                                <input type="number" id="amount" class="form-control"
                                                    placeholder="Amount" name="amount"
                                                    max="{{ Auth::user()->referral_earnings }}" value="1000"
                                                    aria-describedby="currency-symbol" />
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-12">
                                            <div class="form-group">
                                                <label for="bankName">Bank</label>
                                                <select class="form-control" id="bankName" name="bank_name">
                                                    <option selected disabled>Choose Bank</option>
                                                    <option value="Kuda Bank">Kuda Bank</option>
                                                    <option value="Access Bank">Access Bank</option>
                                                    <option value="Citibank">Citibank</option>
                                                    <option value="Eco Bank">Ecobank</option>
                                                    <option value="FCMB">First City Monument Bank (FCMB)</option>
                                                    <option value="Fidelity Bank">Fidelity Bank</option>
                                                    <option value="First Bank">First Bank</option>
                                                    <option value="GTB">Guaranty Trust Bank (GTB)</option>
                                                    <option value="Heritage">Heritage Bank</option>
                                                    <option value="Jaiz Bank">Jaiz Bank</option>
                                                    <option value="Keystone Bank">Keystone Bank</option>
                                                    <option value="Parallex Bank">Parallex Bank</option>
                                                    <option value="Providus">Providus Bank</option>
                                                    <option value="Stanbic IBTC">Stanbic IBTC Bank</option>
                                                    <option value="Skye Bank">Skye Bank</option>
                                                    <option value="Standard Chartered Bank">Standard Chartered Bank</option>
                                                    <option value="Sterling">Sterling Bank</option>
                                                    <option value="Suntrust">Suntrust Bank</option>
                                                    <option value="Titan Trust"> Titan Trust Bank</option>
                                                    <option value="Union Bank">Union Bank</option>
                                                    <option value="UBA">United Bank for Africa (UBA)</option>
                                                    <option value="Unity Bank">Unity Bank</option>
                                                    <option value="Wema Bank">Wema Bank</option>
                                                    <option value="Zenith Bank">Zenith Bank</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-12">
                                            <div class="form-group">
                                                <label for="accountNumber">Account Number</label>
                                                <input type="text" id="accountNumber" class="form-control"
                                                    name="account_number" maxlength="10"
                                                    placeholder="10-Digit Account Number" />
                                            </div>
                                        </div>

                                        <div class="col-12 d-flex justify-content-center mt-3">
                                            <button type="submit" class="btn btn-primary me-3 mb-1" id="cashOutButton">
                                                Withdraw
                                            </button>
                                            <button type="reset" class="btn btn-secondary me-1 mb-1">
                                                Reset
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            @else
                {{-- Ineligible to withdraw --}}
                <div class="container-fluid pt-4 px-4">
                    <div class="row g-4" id="cashOutSection">
                        <div class="col-12">
                            <div class="bg-light rounded p-3">
                                <div class="alert alert-danger">
                                    <h4 class="alert-heading">NO REFFERALS TO WITHDRAW</h4>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endif
        @else
            {{-- Normal cash out period --}}
        @endif
    @else
        {{-- Not cash out period --}}
        <div class="container-fluid pt-4 px-4">
            <div class="row g-4" id="cashOutSection">
                <div class="col-12">
                    <div class="bg-light rounded p-3">
                        <div class="alert alert-danger">
                            <h4 class="alert-heading">WITHDRAWAL NOT AVAILABLE</h4>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endif

    <!-- User Stats Start -->
    <div class="container-fluid pt-4 px-4">
        <div class="row g-4">
        </div>
    </div>
    <!-- User Stats End -->
@endsection
