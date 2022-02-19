@extends('layouts.app')

@section('content')
    @csrf
    <div class="container">
        <form action="{{ url("/articles/create") }}" method="post">
            @csrf
            <input type="hidden" name="article_id" value="{{ $article->id }}">
            
            <input type="text" class="form-control mb-2" name="title" value="{{ $article->title }}">

            <select name="category_id" class="form-select mb-2">
                @foreach($categories as $category)
                    <option value="{{ $category['id'] }}">
                        {{ $category['name'] }}
                    </option>
                @endforeach
            </select>
            
            <textarea name="body" class="form-control mb-2">{{ $article->body }}</textarea>

            <input type="submit" class="btn btn-primary" value="Update Content">
            <a href="{{ url("/articles") }}">Home</a>
        </form>
    </div>
@endsection