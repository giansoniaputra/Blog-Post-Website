@extends('layout.main')
@section('container')
<div class="d-flex justify-content-center">
    <h1 class="my-2">{{ $title }}</h1>
</div>
<div class="container">
    <div class="row justify-content-center">
        <form class="d-flex col-md-6 my-3" role="search" action="/posts/">
            @if(request('category'))
                <input type="hidden" name="category" value="{{ request('category') }}">
            @endif
            @if(request('author'))
                <input type="hidden" name="author" value="{{ request('author') }}">
            @endif
            <input class="form-control me-2" type="text" placeholder="Search" name="search" aria-label="Search"
                value="{{ request('search') }}">
            <button class="btn btn-outline-info " type="submit">Search</button>
        </form>
    </div>
</div>

@if($posts->count())
    <div class="card mb-3">
        @if($posts[0]->image == NULL)
            <img src="https://source.unsplash.com/1200x400?{{ $posts[0]->name }}" alt="{{ $posts[0]->category->name }}"
                class="img-fluid">
        @else
            <img src="/storage/{{ $posts[0]->image }}" alt="{{ $posts[0]->category->name }}" class="img-fluid">
        @endif
        <div class="card-body">
            <h3 class="card-title">{{ $posts[0]->title }}</h3>
            <p><small class="text-muted">By : <a class="text-decoration-none"
                        href="/posts?author={{ $posts[0]->author->username }}">{{ $posts[0]->author->name }}</a>
                    in <a class="text-decoration-none"
                        href="/posts?category={{ $posts[0]->category->slug }}">{{ $posts[0]->category->name }}</a>
            </p>
            <p>{{ $posts[0]->created_at ->diffForHumans() }}</small></p>
            <p class="card-text">{{ $posts[0]->excerpt }}</p>
            <a class="text-decoration-none" href="/posts/{{ $posts[0]->slug }}">Read More...</a>
            <p class="card-text">
        </div>
    </div>

    <div class="container">
        <div class="row">
            @foreach($posts->skip(1) as $post)
                <div class="col-md-4 mb-3">
                    <div class="card" style="width: 18rem;">
                        <div class="position-absolute bg-dark text-white px-2 py-2"
                            style="background-color: rgba(0,0,0,0.4)"><a class="text-decoration-none text-white"
                                href="/posts/{{ $post->slug }}">{{ $post->category->name }}</a></div>
                        @if($post->image == NULL)
                            <img src="https://source.unsplash.com/1200x400?{{ $post->name }}"
                                alt="{{ $post->category->name }}" class="img-fluid">
                        @else
                            <img src="/storage/{{ $post->image }}" alt="{{ $post->category->name }}"
                                class="img-fluid">
                        @endif
                        <div class="card-body">
                            <h5 class="card-title">{{ $post->title }}</h5>
                            <p><small class="text-muted">By : <a class="text-decoration-none"
                                        href="/posts?author={{ $post->author->username }}">{{ $post->author->name }}</a>
                                    in <a class="text-decoration-none"
                                        href="/posts?category={{ $post->category->slug }}">{{ $post->category->name }}</a>
                            </p>
                            <p>{{ $post->created_at ->diffForHumans() }}</small></p>
                            <p class="card-text">{{ $post->excerpt }}</p>
                            <a href="/posts/{{ $post->slug }}" class="btn btn-primary">Read more</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

@else
    <p class="text-center fs-4">No Post Found.</p>
@endif
<div class="d-flex justify-content-end">
    {{ $posts->links() }}
</div>

@endsection
