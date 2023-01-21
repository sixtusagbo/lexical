@extends('layouts.core')

@section('content')
    <!-- Page Header Start -->
    <div class="container-fluid page-header mb-5 wow fadeIn" data-wow-delay="0.1s">
        <div class="container">
            <h1 class="display-3 mb-4 animated slideInDown">Our Blog</h1>
            <nav aria-label="breadcrumb animated slideInDown">
                <ol class="breadcrumb mb-0">
                    <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Blog</li>
                </ol>
            </nav>
        </div>
    </div>
    <!-- Page Header End -->

    <!-- Posts Start -->
    <div class="container-xxl py-3">
        <div class="row">
            @if (count($posts) > 0)
                @foreach ($posts as $post)
                    <div class="col-lg-6">
                        <!-- Blog post-->
                        <div class="card mb-4">
                            <a href="/blog/{{ $post->id }}">
                                <img class="card-img-top" src="{{ asset('storage/images/blog/' . $post->cover_image) }}"
                                    alt="..." />
                            </a>
                            <div class="card-body">
                                <div class="small text-muted">{{ $post->created_at->toDayDateTimeString() }}</div>
                                <h2 class="card-title h4">{{ $post->title }}</h2>
                                <p class="card-text">{!! substr($post->body, 0, 110) . '...' !!}</p>
                                <a class="btn btn-primary" href="/blog/{{ $post->id }}">Read more →</a>
                            </div>
                        </div>
                    </div>
                @endforeach
                <!-- Pagination-->
                <hr class="my-2" />
                <div class="d-flex justify-content-center">{{ $posts->links() }}</div>
            @else
                <div class="col-lg-12">
                    <div class="alert alert-success" role="alert">No posts found!</div>
                </div>
            @endif
        </div>
    </div>
    <!-- Posts End -->
@endsection
