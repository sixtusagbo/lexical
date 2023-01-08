@extends('layouts.dash')

@section('content')
    <section class="container-fluid pt-4 px-4">
        <div class="row g-4">
            <div class="col-12">
                <div class="bg-light rounded p-3 mb-3">
                    <h6 class="mb-3">Add profile image</h6>
                    <div class="card-body">
                        <div class="row justify-content-center" id="profileImageRow">
                            {!! Form::open(['route' => 'uploadProfileImage', 'method' => 'PUT', 'enctype' => 'multipart/form-data']) !!}
                            <div class="form-group text-left mb-3">
                                <label for="profileImage">Profile Image</label>
                                <input type="file" name="profile_image" id="profileImage" class="form-control">
                            </div>
                            <div class="form-group">
                                <button type="submit" name="save-profile-image" class="btn btn-primary btn-block">Save
                                    Changes</button>
                            </div>
                            {!! Form::close() !!}
                        </div>
                    </div>
                </div>

                <div class="bg-light rounded p-3 mb-3">
                    <h6 class="mb-3">Update personal details</h6>
                    <div class="card-body">
                        <div class="row justify-content-center" id="profileImageRow">
                            {!! Form::open(['route' => 'updateBioData', 'method' => 'PUT']) !!}
                            <div class="row">
                                <div class="col-md-6 col-12">
                                    <div class="form-group">
                                        <label for="last-name-column">Last Name</label>
                                        <input name="last_name" type="text" id="last-name-column" class="form-control"
                                            placeholder="Last Name" value="{{ Auth::user()->last_name }}">
                                    </div>
                                </div>
                                <div class="col-md-6 col-12">
                                    <div class="form-group">
                                        <label for="first-name-column">First Name</label>
                                        <input name="first_name" type="text" id="first-name-column" class="form-control"
                                            placeholder="Other Names" value="{{ Auth::user()->first_name }}">
                                    </div>
                                </div>
                                <div class="col-md-6 col-12">
                                    <div class="form-group">
                                        <label for="email-id-column">Email</label>
                                        <input name="email" type="email" id="email-id-column" class="form-control"
                                            placeholder="Email" value="{{ Auth::user()->email }}" readonly>
                                    </div>
                                </div>
                                <div class="col-md-6 col-12">
                                    <div class="form-group">
                                        <label for="phone-column">Phone number</label>
                                        <input name="phone_number" type="number" id="phone-column" class="form-control"
                                            placeholder="Phone number" value="{{ Auth::user()->phone_number }}">
                                    </div>
                                </div>
                                <div class="col-md-6 col-12">
                                    <div class="form-group">
                                        <label for="state">State</label>
                                        <select class="form-select" id="state" name="state">
                                            <option selected disabled>Choose State</option>
                                            <option>ABUJA(FCT)</option>
                                            <option>ABIA</option>
                                            <option>ADAMAWA</option>
                                            <option>AKWA IBOM</option>
                                            <option>ANAMBRA</option>
                                            <option>BAUCHI</option>
                                            <option>BAYELSA</option>
                                            <option>BENUE</option>
                                            <option>BORNO</option>
                                            <option>CROSS RIVER</option>
                                            <option>DELTA</option>
                                            <option>EBONYI</option>
                                            <option>EDO</option>
                                            <option>EKITI</option>
                                            <option>ENUGU</option>
                                            <option>GOMBE</option>
                                            <option>IMO</option>
                                            <option>JIGAWA</option>
                                            <option>KADUNA</option>
                                            <option>KANO</option>
                                            <option>KATSINA</option>
                                            <option>KEBBI</option>
                                            <option>KOGI</option>
                                            <option>KWARA</option>
                                            <option>LAGOS</option>
                                            <option>NASSARAWA</option>
                                            <option>NIGER</option>
                                            <option>OGUN</option>
                                            <option>ONDO</option>
                                            <option>OSUN</option>
                                            <option>OYO</option>
                                            <option>PLATEAU</option>
                                            <option>RIVERS</option>
                                            <option>SOKOTO</option>
                                            <option>TARABA</option>
                                            <option>YOBE</option>
                                            <option>ZAMFARA</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6 col-12">
                                    <div class="form-group">
                                        <label for="country">Country</label>
                                        <input type="text" id="country" class="form-control" name="country"
                                            placeholder="Country" value="Nigeria" readonly>
                                    </div>
                                </div>

                                <div class="col-12 mt-3">
                                    <button type="submit" name="save-personal-details"
                                        class="btn btn-primary btn-block">Save Changes</button>
                                </div>
                            </div>
                            {!! Form::close() !!}
                        </div>
                    </div>
                </div>

                <div class="bg-light rounded p-3">
                    <h6 class="mb-3">Update Password</h6>
                    <div class="card-body">
                        <div class="row justify-content-center" id="profileImageRow">
                            {!! Form::open(['route' => 'updateUserPassword', 'method' => 'PUT']) !!}
                            <div class="input-group mb-3">
                                <span class="input-group-text" id="basic-addon1"><i class="bi bi-shield-lock"></i></span>
                                <input name="password" type="password" class="form-control form-control-xl"
                                    placeholder="Password" aria-describedby="basic-addon1">
                            </div>
                            <div class="input-group mb-3">
                                <span class="input-group-text" id="basic-addon2"><i class="bi bi-shield-lock"></i></span>
                                <input name="password_confirmation" type="password" class="form-control form-control-xl"
                                    placeholder="Confirm Password" aria-describedby="basic-addon2">
                            </div>

                            <div class="form-group">
                                <button type="submit" name="update-password" class="btn btn-primary btn-block">Save
                                    Changes</button>
                            </div>
                            {!! Form::close() !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
