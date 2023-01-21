@extends('layouts.core')

@section('style')
    <style>
        html,
        body {
            overflow-x: hidden;
            width: 100% !important;
        }

        .page-header {
            background-image: url('{{ asset('uploads/post/' . $post->cover_image) }}') !important;
        }
    </style>
@endsection

@section('content')
    <!-- Page Header Start -->
    <div class="container-fluid page-header mb-5 wow fadeIn" data-wow-delay="0.1s">
        <div class="container">
            <h1 class="display-3 mb-4 animated slideInDown">{{ $post->title }}</h1>
            <nav aria-label="breadcrumb animated slideInDown">
                <ol class="breadcrumb mb-0">
                    <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('blog.index') }}">Blog</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Post</li>
                </ol>
            </nav>
        </div>
    </div>
    <!-- Page Header End -->

    <!-- Posts Start -->
    <div class="container-xxl py-3">
        <!-- Post content Start -->
        <article>
            <!-- Post header-->
            <header class="mb-3">
                <div class="d-flex" style="gap:1rem;">
                    <!-- Post meta content-->
                    <div class="text-muted fst-italic mx-3">Posted on
                        {{ $post->created_at->toFormattedDateString() }}</div>

                    @auth
                        @if ($valid_to_share)
                            <form action="" method="POST" class="d-none" id="sharePostForm">
                                <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
                            </form>
                            <a class="btn btn-primary rounded-circle h-75" data-bs-toggle="modal" data-bs-target="#shareModal">
                                <i class="bi bi-share-fill"></i>
                            </a>

                            <!-- Modal -->
                            <div class="modal fade" id="shareModal" tabindex="-1" aria-labelledby="shareModalLabel"
                                aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="shareModalLabel">Share Post</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <div class="share-btn" data-url="{{ route('blog.show', $post->id) }}"
                                                data-title="<?= $post->title ?>"
                                                data-desc="<?= substr($post->body, 0, 15) . '...' ?>">
                                                <a class="btn btn-primary rounded-pill" data-id="fb"><i
                                                        class="bi bi-facebook"></i>
                                                    Facebook</a>
                                                <a class="btn btn-primary rounded-pill" data-id="tw"><i
                                                        class="bi bi-twitter"></i>
                                                    Twitter</a>
                                                <a class="btn btn-primary rounded-pill" data-id="tg"><i
                                                        class="bi bi-telegram"></i>
                                                    Telegram</a>
                                                <a class="btn btn-success rounded-pill" data-id="wa"><i
                                                        class="bi bi-whatsapp"></i>
                                                    WhatsApp</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endif

                        @if (Auth::user()->type == 1)
                            <a href="/blog/{{ $post->id }}/edit" class="btn btn-info mb-2"><i
                                    class="bi bi-pencil-square"></i></a>
                            {!! Form::open(['route' => ['blog.destroy', $post->id], 'method' => 'DELETE', 'class' => 'form-inline']) !!}
                            <button type="submit" class="btn btn-danger"><i class="bi bi-trash-fill"></i></button>
                            {!! Form::close() !!}
                        @endif
                    @endauth
                </div>
            </header>
            <!-- Post content End -->
            <section class="mb-5">
                <article class="fs-5 mb-4">{!! $post->body !!}</article>
            </section>
        </article>
    </div>
    <!-- Posts End -->
@endsection

@section('script')
    <script src="//cdn.jsdelivr.net/npm/share-buttons/dist/share-buttons.js"></script>
@endsection
