@extends('layout.main')

@section('container')
<main class="form-signin w-100 m-auto mt-3">
    <div class="d-flex justify-content-center">
        <img class="mb-4"
            src="https://cdn.idntimes.com/content-images/post/20220611/car-key-842107-a5c6e88d36ac53b70d7efe20cda6cb31_600x400.jpg"
            alt="" width="72" height="57">
    </div>
    <h1 class="h3 mb-3 fw-normal">Registrasi</h1>

    <form action="/register" method="post" class="form-registration">
        @csrf
        <div class="form-floating">
            <input type="text" class="form-control rounded-top @error('name') is-invalid @enderror" name="name"
                id="name" placeholder="Input Name" value="{{ old('name') }}">
            <label for="name">Nama</label>
            <div class="invalid-feedback">
                @error('name') {{ $message }} @enderror
            </div>
        </div>
        <div class="form-floating">
            <input type="text" class="form-control @error('username') is-invalid @enderror" name="username"
                id="username" placeholder="Input Username" value="{{ old('username') }}">
            <label for="username">Username</label>
            <div class="invalid-feedback">
                @error('username') {{ $message }} @enderror
            </div>
        </div>
        <div class="form-floating">
            <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email"
                placeholder="name@example.com" value="{{ old('email') }}">
            <label for="email">Email address</label>
            <div class="invalid-feedback">
                @error('email') {{ $message }} @enderror
            </div>
        </div>
        <div class="form-floating">
            <input type="password" class="form-control rounded-bottom @error('password') is-invalid @enderror"
                name="password" id="Password" placeholder="Enter Password">
            <label for="Password">Password</label>
            <div class="invalid-feedback">
                @error('password') {{ $message }} @enderror
            </div>
        </div>
        <button class="w-100 btn btn-lg btn-primary" type="submit">Sign Up</button>
    </form>
    <div class="d-flex justify-content-center mt-3">
        <small><a href="/login" class="text-decoration-none text-darkk">Sign In Here</a></small>
    </div>
</main>
@endsection
