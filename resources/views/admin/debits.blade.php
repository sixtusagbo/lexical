@extends('layouts.admin')

@section('content')
    <!-- All Cashout Day Toggler Start -->
    <div class="container-fluid pt-4 px-4">
        <div class="row g-4 mb-4">
            <div class="col-12 col-lg-12">
                <div class="bg-light text-light rounded p-3 shadow-sm">
                    <h6 class="mb-3">Toggle Cashout Day</h6>
                    <form action="{{ route('debits.toggle') }}" method="post" class="form form-horizontal">
                        @csrf

                        <div class="form-body text-dark">
                            <div class="row">
                                <div class="col-md-4">
                                    <label>Cashout day</label>
                                </div>
                                <div class="col-md-8 form-group">
                                    <div class="form-check form-switch">
                                        <input class="form-check-input" name="cashout_day" type="checkbox" role="switch">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <label>Close Cashouts</label>
                                </div>
                                <div class="col-md-8 form-group">
                                    <div class="form-check form-switch">
                                        <input class="form-check-input" name="close_cashout" type="checkbox" role="switch"
                                            id="cashOutDay">
                                    </div>
                                </div>
                                <div class="col-sm-12 d-flex justify-content-center">
                                    <button type="submit" class="btn btn-success me-1 mb-1">Save
                                        Changes</button>
                                </div>
                            </div>
                        </div>
                    </form>

                </div>
            </div>
            <!--//row-->
        </div>
    </div>
    <!-- All Cashout Day Toggler End -->

    <!-- All Withdrawals Start -->
    <div class="container-fluid pt-4 px-4">
        <div class="row g-4 mb-4">
            <div class="col-12 col-lg-12">
                <div class="bg-light text-light rounded p-3 shadow-sm">
                    <h6 class="mb-3">Pending Cashouts ({{ $withdrawals->count() }})</h6>
                    <div class="table-responsive w-100">
                        <table class="table table-dark table-striped">
                            <thead>
                                <tr>
                                    <th>Date</th>
                                    <th>Amount</th>
                                    <th>Bank Name</th>
                                    <th>Account Number</th>
                                    <th>Account Name</th>
                                    <th>Status</th>
                                    <th>Options</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($withdrawals as $withdrawal)
                                    <tr>
                                        <td class="item">{{ $withdrawal->created_at->toFormattedDateString() }}</td>
                                        <td class="item">
                                            @money($withdrawal->amount)
                                        </td>
                                        <td class="item">{{ $withdrawal->bank }}</td>
                                        <td class="item">{{ $withdrawal->acc_num }}</td>
                                        <td class="item">{{ $withdrawal->acc_name }}</td>
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
                                        <td class="item">
                                            <a href="" data-bs-toggle="modal" class="btn btn-info mb-2 me-2"
                                                data-bs-target="#editWithdrawal{{ $withdrawal->id }}">
                                                Edit
                                            </a>
                                            <a href="" data-bs-toggle="modal" class="btn btn-danger mb-2"
                                                data-bs-target="#deleteWithdrawal{{ $withdrawal->id }}">
                                                Delete
                                            </a>
                                        </td>
                                    </tr>

                                    <!-- Edit Withdrawal Model -->
                                    <div class="modal fade" id="editWithdrawal{{ $withdrawal->id }}" tabindex="-1"
                                        role="dialog" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content bg-dark text-light">
                                                <div class="modal-header">
                                                    <h4 class="modal-title text-primary">Edit Cashout</h4>
                                                    <a class="close" type="button" data-dismiss="modal"
                                                        aria-label="Close">
                                                        <i class="ti-close opacity-10 text-info"></i>
                                                    </a>
                                                </div>
                                                <div class="modal-body" id="editWithdrawalModalBody">
                                                    <form class="pt-3" role="form" method="POST"
                                                        action="{{ route('debits.update', $withdrawal->id) }}"
                                                        id="editWithdrawal">
                                                        @csrf

                                                        <div class="mb-3">
                                                            <input type="text" class="form-control text-capitalize"
                                                                value="{{ $withdrawal->acc_num }}" readonly>
                                                        </div>
                                                        <div class="mb-3">
                                                            <input type="text" class="form-control text-capitalize"
                                                                value="{{ $withdrawal->bank }}" readonly>
                                                        </div>
                                                        <div class="mb-3">
                                                            <input type="text" class="form-control text-capitalize"
                                                                value="{{ $withdrawal->acc_name }}" readonly>
                                                        </div>
                                                        <div class="mb-3">
                                                            <input type="text" class="form-control"
                                                                value="@money($withdrawal->amount)" readonly>
                                                        </div>

                                                        <div class="mb-3">
                                                            <select name="status" id="" class="form-control"
                                                                required>

                                                                <option value="0"
                                                                    @if ($withdrawal->status == 0) selected @endif>
                                                                    Pending
                                                                </option>
                                                                <option value="1"
                                                                    @if ($withdrawal->status == 1) selected @endif>
                                                                    Approve</option>
                                                                <option value="2"
                                                                    @if ($withdrawal->status == 2) selected @endif>
                                                                    Decline</option>
                                                            </select>
                                                        </div>

                                                        <div class="mb-3">
                                                            <input type="text" class="form-control" placeholder="Remark"
                                                                name="remark" required>
                                                        </div>

                                                        <input type="hidden" name="_method" value="PUT">
                                                </div>
                                                <div class="modal-footer">
                                                    <div class="row">
                                                        <div class="col-md-12">
                                                            <button type="button" class="btn btn-secondary"
                                                                data-bs-dismiss="modal">Cancel</button>
                                                            <button type="submit"
                                                                class="btn btn-primary btn-md font-weight-medium auth-form-btn">
                                                                Update Cashout
                                                            </button>
                                                        </div>
                                                    </div>
                                                </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                    <!--//Edit Withdrawal-->

                                    <!--Delete Withdrawal-->
                                    <div class="modal fade" id="deleteWithdrawal{{ $withdrawal->id }}" tabindex="-1"
                                        role="dialog" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content bg-dark text-light">
                                                <div class="modal-header">
                                                    <h4 class="modal-title text-primary">Delete Withdrawal</h4>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                        aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body" id="deleteWithdrawalModalBody">
                                                    <p>
                                                        Are you sure you wish to delete this withdrawal?
                                                    </p>
                                                    <form method="POST"
                                                        action="{{ route('debits.destroy', $withdrawal->id) }}"
                                                        id="deleteWithdrawal">
                                                        @csrf
                                                        <input type="hidden" name="_method" value="DELETE">
                                                </div>
                                                <div class="modal-footer">
                                                    <div class="row">
                                                        <div class="col-md-12">
                                                            <button type="button" class="btn btn-secondary"
                                                                data-bs-dismiss="modal">No</button>
                                                            <button type="submit" class="btn btn-success">
                                                                Yes
                                                            </button>
                                                        </div>
                                                    </div>
                                                </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                    <!--//Delete Withdrawal-->
                                    @empty
                                        <div class="alert alert-info" role="alert">
                                            No cashouts yet, enjoy the quietness &#x1F31D;
                                        </div>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>

                    </div>
                    {{ $withdrawals->links() }}

                </div>
            </div>
            <!--//row-->
        </div>
        <!-- All Withdrawals End -->
    @endsection
