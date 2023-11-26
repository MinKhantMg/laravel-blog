@extends("layouts.app")

@section('content')
    <div class="container">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">{{ $article->title }}</h5>
                <div class="card-subtitle text-muted small">
                    {{ $article->created_at->diffForHumans() }}
                </div>
                <p class="card-text">{{ $article->body }}</p>
                <a class="btn btn-warning"
                    href='{{ url("/articles/delete/$article->id") }}'>
                    Delete
                </a>
            </div>
        </div>
    </div>
@endsection
