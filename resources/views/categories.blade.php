@extends('layout.main')
@section('container')
<h2 class="mt-2 mb-2">Daftar kategori</h2>

<div class="container">
    <div class="row">
        @foreach($categories as $category)
        <div class="col-md-4">
            <a href="posts?category={{ $category->slug }}">
                <div class="card text-bg-dark">
                    <img src="https://source.unsplash.com/500x500?{{ $category->name }}" class="card-img" alt="...">
                    <div class="card-img-overlay d-flex align-items-center justify-content-center p-0">
                        <h5 class="card-title text-white p-4" style="background-color: rgb(0, 0, 0, 0.5)">
                            {{ $category->name }}</h5>
                    </div>
                </div>
            </a>
        </div>
        @endforeach
    </div>
</div>
@endsection
