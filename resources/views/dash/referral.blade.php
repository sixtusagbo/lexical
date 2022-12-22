@extends('layouts.dash')

@section('content')
    <div class="container-fluid pt-4 px-4">
        <label for="referralLink" class="form-label"></label>
        <div class="input-group" onclick="copyLink()">
            <span class="input-group-text text-light bg-dark">Your referral link:</span>
            <input type="text" id="referralLink" class="form-control" value="{{ Auth::user()->referral_link }}" disabled>
            <span class="input-group-text bg-dark text-light"> <i class="fa fa-copy"></i> </span>
        </div>
    </div>

    <div class="container-fluid pt-4 px-4">
        <div class="col-12">
            <div class="bg-light rounded h-100 p-4">
                <h6 class="mb-4">Referrals</h6>
                @forelse (Auth::user()->referrals as $user)
                    <div class="table-responsive">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th scope="col">First Name</th>
                                    <th scope="col">Last Name</th>
                                    <th scope="col">Email</th>
                                    <th scope="col">Date</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>{{ $user->first_name }}</td>
                                    <td>{{ $user->last_name }}</td>
                                    <td>{{ $user->email }}</td>
                                    <td>{{ $user->created_at->toFormattedDateString() }}</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                @empty
                    <span class="badge rounded-pill bg-info text-dark">No referrals yet</span>
                @endforelse
            </div>
        </div>
    </div>

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
    <script>
        function copyLink() {
            /* Get the text field */
            var refInput = document.getElementById("referralLink");

            /* Select the text field */
            refInput.select();

            /* Copy the link inside the text field */
            document.execCommand("copy");

            /* Alert the copied link */
            alert("Referral link copied");
        }
    </script>
@endsection
