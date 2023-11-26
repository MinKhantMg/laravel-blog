@extends("layouts.app")

@section('content')
    <div class="container">

        <div class="card mb-2">
            <div class="card-body">
                <h5 class="card-title">{{ $article->title }}</h5>
                <div class="card-subtitle text-muted small">
                    {{ $article->created_at->diffForHumans() }}
                    Category: <b>{{ $article->category->name }}</b>
                </div>
                <p class="card-text">{{ $article->body }}</p>
                <a class="btn btn-warning"
                    href='{{ url("/articles/delete/$article->id") }}'>
                    Delete
                </a>
            </div>
        </div>

        <ul class="list-group mb-2">
            <li class="list-group-item active">
                <b>Comments ({{ count($article->comments) }})</b>
            </li>
            @foreach($article->comments as $comment)
                <li class="list-group-item">
                    <a href='{{ url("/comments/delete/$comment->id") }}'
                        class="btn-close float-end">
                    </a>
                    {{ $comment->content }}
                </li>
            @endforeach
        </ul>

        <form action='{{ url("/comments/add") }}' method="post">
            @csrf
            <input type="hidden" name="article_id" value="{{ $article->id }}">
            <textarea name="content" class="form-control mb-2" placeholder="New Comment"></textarea>
            <button type="submit" class="btn btn-secondary">Add Comment</button>
        </form>
    </div>
@endsection
