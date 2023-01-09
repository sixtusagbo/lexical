@extends('layouts.admin')

@section('content')
    <!-- Unused Coupons Start -->
    <div class="container-fluid pt-4 px-4">
        <div class="row g-4 mb-4">
            <div class="col-12 col-lg-12">
                <div class="bg-light text-light rounded p-3 shadow-sm">
                    <h6 class="mb-3">Unused coupons</h6>
                    <form action="{{ route('coupons.create') }}" class="form-inline mb-3 px-3">
                        <div class="row">
                            <div class="col-sm-6 col-xl-6 rounded bg-dark text-light fw-bold pt-2 mb-2">
                                <label for="customRange2" class="form-label">Quantity</label>
                                <input type="range" name="quantity" class="form-range" min="0" max="5"
                                    value="1" id="customRange2" required>
                            </div>
                            <div class="col-sm-6 col-xl-6 d-flex justify-content-center">
                                <button type="submit" class="btn btn-success w-100 mb-3">New
                                    Coupon</button>
                            </div>
                        </div>
                    </form>

                    <div class="table-responsive w-100">
                        <table class="table table-dark table-striped">
                            <thead>
                                <tr>
                                    <th>Code</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($coupons as $coupon)
                                    <tr>
                                        <td class="item">{{ $coupon->code }}</td>
                                    </tr>
                                @empty
                                    <div class="alert alert-warning" role="alert">
                                        Admin please run your migrations!
                                    </div>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                    {{ $coupons->links() }}

                </div>
            </div>
        </div>
        <!--//row-->
    </div>
    <!-- Unused Coupons End -->
@endsection
