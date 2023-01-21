@extends('layouts.admin')

@section('content')
    <section class="container-fluid pt-4 px-4">
        <div class="row g-4">
            <div class="col-12">
                <div class="bg-light rounded p-3 mb-3">
                    <h6 class="mb-3">Create new post</h6>
                    <div class="card-body">
                        <div class="row justify-content-center" id="profileImageRow">
                            {!! Form::open(['route' => 'blog.store', 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}

                            <div class="form-group text-left mb-2">
                                <label for="title" class="form-label">Title</label>
                                <input type="text" name="title" id="title" class="form-control"
                                    value="{{ old('title') }}" required>
                            </div>

                            <div class="form-group text-left mb-2">
                                <label for="body" class="form-label">Body</label>
                                <textarea name="body" class="form-control" id="body" rows="10" maxlength="1900"></textarea>
                            </div>

                            <div class="form-group text-left mb-3">
                                <label for="cover_image" class="form-label">Cover Image</label>
                                <input type="file" name="cover_image" id="cover_image" class="form-control">
                            </div>

                            <div class="form-group">
                                <button type="submit" class="btn btn-primary btn-block">Save</button>
                            </div>
                            {!! Form::close() !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
