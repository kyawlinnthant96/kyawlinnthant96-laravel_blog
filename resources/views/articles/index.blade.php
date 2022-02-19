
    @extends("layouts.app")

    @section("content")
        <div class="container">

            @if (session('info'))
                <div class="alert alert-info">
                    {{ session('info') }}
                </div>
            @endif

            {{ $articles->links() }}

            @foreach($articles as $article)
                <div class="card mb-2">
                    <div class="card-body">
                        <h5 class="card-title">
                            {{ $article->title }}
                        </h5>
                        <div class="card-subtitle mb-2 text-muted small">
                            {{ $article->created_at->diffForHumans() }}
                            Cartegory: <b>{{ $article->category->name }}</b>
                            Author: <b></b>
                        </div>
                        <p class="card-text">
                            {{ $article->body }}
                        </p>
                        <a href="{{ url("/articles/detail/$article->id") }}" 
                            class="card-link">View Detail &laquo;
                        </a>
                        <b>Comments ({{ count($article->comments) }})</b>
                        <a href="{{ url("/articles/edit/$article->id") }}" style="float:right">Edit</a>
                    </div>
                </div>
            @endforeach
        </div>
    @endsection
