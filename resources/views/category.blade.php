@extends('layout.main')
@section('container')
<h2 class="mt-2 mb-2">Postingan Category : {{ $category }}</h2>
<article class="mb-5">
    @foreach ($posts as $post)
    <h2>
        <a href="/posts/{{ $post->slug }}">{{ $post->title }}</a>
    </h2>
    <h5>By: {{$post->author}}</h5>
    <p>{{$post->excerpt}}</p>
</article>
@endforeach
@endsection