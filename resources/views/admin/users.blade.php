@extends('layouts.admin')

@section('content')
    <!-- All Users Start -->
    <div class="container-fluid pt-4 px-4">
        <div class="row g-4 mb-4">
            <div class="col-12 col-lg-12">
                <div class="bg-light text-light rounded p-3 shadow-sm">
                    <h6 class="mb-3">All Members ({{ $users->count() }})</h6>
                    <div class="table-responsive w-100">
                        <table class="table table-dark table-striped">
                            <thead>
                                <tr>
                                    <th>Full Name</th>
                                    <th>Email</th>
                                    <th>Phone Number</th>
                                    <th>Referred By:</th>
                                    <th>Coupon</th>
                                    <th>Options</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($users as $user)
                                    <tr>
                                        <td class="item">{{ $user->full_name }}</td>
                                        <td class="item">{{ $user->email }}
                                        </td>
                                        <td class="item">{{ $user->phone_number }}</td>
                                        <td class="item">
                                            {{ $user->referrer ? $user->referrer->full_name : 'Nobody' }}</td>
                                        <td class="item">{{ $user->coupon ? $user->coupon->code : 'Auto User' }}</td>
                                        <td class="item">
                                            <a href="" data-bs-toggle="modal" class="btn btn-danger"
                                                data-bs-target="#deleteUser{{ $user->id }}">
                                                Delete
                                            </a>
                                        </td>
                                    </tr>

                                    <!--Delete User-->
                                    <div class="modal fade" id="deleteUser{{ $user->id }}" tabindex="-1" role="dialog"
                                        aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content bg-dark">
                                                <div class="modal-header">
                                                    <h4 class="modal-title text-primary">Delete User</h4>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                        aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body" id="DeleteUserModalBody">
                                                    <p>
                                                        Are you sure you wish to delete
                                                        "{{ $user->full_name }}"?
                                                    </p>
                                                    <form method="POST" action="{{ route('user.destroy', $user->id) }}"
                                                        id="deleteUser">
                                                        @csrf
                                                        <input type="hidden" name="_method" value="DELETE">
                                                </div>
                                                <div class="modal-footer">
                                                    <div class="row">
                                                        <div class="col-md-12">
                                                            <button type="submit" class="btn btn-success">
                                                                Yes
                                                            </button>
                                                            <button type="button" class="btn btn-secondary"
                                                                data-bs-dismiss="modal">No</button>
                                                        </div>
                                                    </div>
                                                </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                    <!--//Delete User-->
                                @empty
                                    <div class="alert alert-warning" role="alert">
                                        Admin please run your migrations!
                                    </div>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                    {{ $users->links() }}

                </div>
            </div>
        </div>
        <!--//row-->
    </div>
    <!-- All Users End -->
@endsection
