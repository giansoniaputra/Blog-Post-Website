@extends('layout.main')



@section('container')
<main class="form-signin w-100 m-auto mt-3">
    @if(session()->has('message'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{ session('message') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @endif
    @if(session()->has('loginError'))
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        {{ session('loginError') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @endif
    <form action="/login" method="post">
        @csrf
        <div class="d-flex justify-content-center">
            <img class="mb-4"
                src="https://cdn.idntimes.com/content-images/post/20220611/car-key-842107-a5c6e88d36ac53b70d7efe20cda6cb31_600x400.jpg"
                alt="" width="72" height="57">
        </div>

        <h1 class="h3 mb-3 fw-normal">Please sign in</h1>

        <div class="form-floating">
            <input type="email" class="form-control @error('email') is-invalid @enderror" name="email" id="email"
                placeholder="name@example.com" value="{{ old('email') }}" autofocus>
            <label for="email">Email address</label>
            @error('email')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
            @enderror
        </div>
        <div class="form-floating">
            <input type="password" class="form-control" name="password" id="password" placeholder="Password">
            <label for="password">Password</label>
        </div>
        <button class="w-100 btn btn-lg btn-primary" type="submit">Sign in</button>
    </form>
    <div class="d-flex justify-content-center mt-3">
        <small><a href="/register" class="text-decoration-none text-darkk">Sign Up Here</a></small>
    </div>
</main>
@endsection
