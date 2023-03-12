@extends('layout.main')
@section('container')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8 ">
            <h2>{{ $posts->title }}</h2>
            <h5>by : <a href="/posts?author={{ $posts->author->username }}">{{ $posts->author->username }}</a>
                in <a class="text-decoration-none"
                    href="/posts?category={{ $posts->category->slug }}">{{ $posts->category->name }}</a></h5>
            @if($posts->image == NULL)
                <img src="https://source.unsplash.com/1200x400?{{ $posts->name }}"
                    alt="{{ $posts->category->name }}" class="img-fluid">
            @else
                <img src="/storage/{{ $posts->image }}" alt="{{ $posts->category->name }}" class="img-fluid">
            @endif
            <article class="my-3 fs-6">
                <p>{!! $posts->body !!}</p>
            </article>
        </div>
    </div>
</div>
@endsection
