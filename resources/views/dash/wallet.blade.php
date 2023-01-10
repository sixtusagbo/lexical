@extends('layouts.dash')

@section('content')
    <!-- User Stats Start -->
    <div class="container-fluid pt-4 px-4">
        <div class="row g-4">
            <div class="col-sm-6 col-xl-4">
                <div class="bg-light rounded d-flex align-items-center p-4">
                    <i class="fa fa-wallet fa-3x text-primary"></i>
                    <div class="ms-4">
                        <p class="mb-2">Total Earnings</p>
                        <h6 class="mb-0">@money(Auth::user()->total_earnings)</h6>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-xl-4">
                <div class="bg-light rounded d-flex align-items-center p-4">
                    <i class="fa fa-tasks fa-3x text-primary"></i>
                    <div class="ms-4">
                        <p class="mb-2">Task Earnings</p>
                        <h6 class="mb-0">@money(Auth::user()->task_earnings)</h6>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-xl-4">
                <div class="bg-light rounded d-flex align-items-center p-4">
                    <i class="fa fa-user-plus fa-3x text-primary"></i>
                    <div class="ms-2">
                        <p class="mb-2">Referral Earnings</p>
                        <h6 class="mb-0">@money(Auth::user()->referral_earnings)</h6>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- User Stats End -->

    @if (config('myglobals.cashout_day') || config('myglobals.referral_cashout_day'))
        {{-- Cashout period --}}

        {{-- Normal cash out --}}
        @if (Auth::user()->task_earnings > 0)
            {{-- Eligible to withdraw --}}
            <div class="container-fluid pt-4 px-4">
                <div class="row g-4" id="cashOutSection">
                    <div class="col-12">
                        <div class="bg-light text-light rounded p-3">
                            <h6 class="mb-3">Task Cashout</h6>
                            <div class="alert alert-primary alert-dismissible show fade">
                                <h4 class="alert-heading">Important!</h4>
                                <p>Account name must match your full name - <b>{{ Auth::user()->full_name }}</b></p>
                                <button type="button" class="btn-close" data-bs-dismiss="alert"
                                    aria-label="Close"></button>
                            </div>
                            <form method="post" class="form" id="cashOutForm" action="{{ route('task_cashout') }}">
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
                                            <input type="number" id="amount" class="form-control" placeholder="Amount"
                                                name="amount" max="{{ Auth::user()->referral_earnings }}" value="1000"
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
                                                <option value="Standard Chartered Bank">Standard Chartered Bank
                                                </option>
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
                            <h6 class="mb-3">Task Cashout</h6>
                            <div class="alert alert-danger">
                                <h6 class="alert-heading">INSUFFICIENT BALANCE</h6>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endif

        {{-- Referral cashout --}}
        @if (Auth::user()->referral_earnings > 0 && Auth::user()->referrals->count() > 2)
            {{-- Eligible to withdraw --}}
            <div class="container-fluid pt-4 px-4">
                <div class="row g-4" id="cashOutSection">
                    <div class="col-12">
                        <div class="bg-light text-light rounded p-3">
                            <h6 class="mb-3">Referral Cashout</h6>
                            <div class="alert alert-primary alert-dismissible show fade">
                                <h4 class="alert-heading">Important!</h4>
                                <p>Account name must match your full name - <b>{{ Auth::user()->full_name }}</b></p>
                                <button type="button" class="btn-close" data-bs-dismiss="alert"
                                    aria-label="Close"></button>
                            </div>
                            <form method="post" class="form" id="cashOutForm"
                                action="{{ route('referral_cashout') }}">
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
                            <h6 class="mb-3">Referral Cashout</h6>
                            <div class="alert alert-danger">
                                <h6 class="alert-heading">INELIGIBLE TO WITHDRAW</h6>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endif
    @else
        {{-- Not cash out period --}}
        <div class="container-fluid pt-4 px-4">
            <div class="row g-4" id="cashOutSection">
                <div class="col-12">
                    <div class="bg-light rounded p-3">
                        <div class="alert alert-danger">
                            <h6 class="alert-heading">WITHDRAWAL NOT AVAILABLE</h6>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endif

    <!-- ALl Withdrawals Start -->
    <div class="container-fluid pt-4 px-4">
        <div class="row g-4">
            <div class="col-12">
                <div class="bg-light text-light rounded p-3">
                    <h6 class="mb-3">Cashouts</h6>
                    <div class="table-responsive">
                        <table class="table table-lg table-striped">
                            <thead>
                                <tr>
                                    <th>Date</th>
                                    <th>Amount</th>
                                    <th>Bank Name</th>
                                    <th>Account Number</th>
                                    <th>Status</th>
                                    <th>Remark</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($withdrawals as $withdrawal)
                                    <tr>
                                        <td> {{ $withdrawal->created_at->toDayDateTimeString() }} </td>
                                        <td> {{ $withdrawal->amount }} </td>
                                        <td> {{ $withdrawal->bank }} </td>
                                        <td> {{ $withdrawal->acc_num }} </td>
                                        <td>
                                            @switch($withdrawal->status)
                                                @case(0)
                                                    <span class="badge text-bg-warning">Pending</span>
                                                @break

                                                @case(1)
                                                    <span class="badge text-bg-success">Successful</span>
                                                @break

                                                @case(2)
                                                    <span class="badge text-bg-danger">Failed</span>
                                                @break
                                            @endswitch
                                        </td>
                                        <td> {{ $withdrawal->remark }} </td>
                                    </tr>
                                    @empty
                                        <span class="badge rounded-pill bg-info text-dark">No withdrawals yet</span>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- ALl Withdrawals End -->
    @endsection
