@if (count($errors) > 0)
    @foreach ($errors->all() as $error)
        <div class="container-fluid pt-4 px-4">
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <h5>{{ $error }}</h5>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        </div>
    @endforeach
@endif

@if (session('success'))
    <div class="container-fluid pt-4 px-4">
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <h5>{{ session('success') }}</h5>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    </div>
@endif

@if (session('error'))
    <div class="container-fluid pt-4 px-4">
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <h5>{{ session('error') }}</h5>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    </div>
@endif
