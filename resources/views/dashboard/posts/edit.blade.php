@extends('dashboard.layouts.main')

@section('container')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">EDIT POST</h1>
</div>
<div class="col-lg-8">

    <form method="post" action="/dashboard/posts/{{ $post->slug }}" enctype="multipart/form-data">
        @method('put')
        @csrf
        <div class="mb-3">
            <label for="title" class="form-label">Title</label>
            <input type="text" name="title" class="form-control @error('title') is-invalid @enderror" id="title"
                value="{{ old('title', $post->title) }}">
            @error('title')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="slug" class="form-label">Slug</label>
            <input type="text" name="slug" class="form-control @error('slug') is-invalid @enderror" id="slug" readonly
                value="{{ old('slug', $post->slug) }}">
            @error('slug')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>
        <label for="category_id" class="form-label">Kategori</label>
        <div class="mb-3">
            <select class="form-select @error('category_id') is-invalid @enderror" name="category_id" id="category_id">
                <option selected disabled value="">Pilih Kategori</option>
                @foreach( $categories as $category)
                    <option value="{{ $category->id }}"
                        {{ ($category->id == old('category_id', $post->category_id) ? 'selected':'') }}>
                        {{ $category->name }}</option>
                @endforeach
            </select>
            @error('category_id')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="image" class="form-label">Sampul</label>
            <input type="hidden" name="oldImage" value="{{ $post->image }}">
            @if($post->image)
                <img src="{{ asset('storage/'. $post->image) }}" alt="" class="img-fluid img-preview mb-2 col-sm-5">
            @else
                <img class="img-fluid img-preview mb-2 col-sm-5">
            @endif
            <input class="form-control @error('image') is-invalid @enderror" name="image" type="file" id="image" onchange="previewImage()">
            @error('image')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>
        <div class="mb-3 mt-3">
            <label for="body" class="form-label">body</label>
            <input id="body" type="hidden" name="body" value="{{ old('body', $post->body) }}">
            <trix-editor input="body"></trix-editor>
            @error('body')
                <p class="text-danger mb-3">
                    {{ $message }}
                </p>
            @enderror
        </div>
        <button type="submit" class="btn btn-primary">Update Post</button>
    </form>
</div>

<script>
    const title = document.querySelector('#title');
    const slug = document.querySelector('#slug');

    title.addEventListener('change', function () {
        fetch('/dashboard/posts/cekSlug?title=' + title.value)
            .then(response => response.json())
            .then(data => slug.value = data.slug)
    });

    document.addEventListener('trix-file-accept', function (event) {
        event.preventDefault();
    })

    function previewImage() {
        const image = document.querySelector('#image');
        const imgPre = document.querySelector('.img-preview');

        imgPre.style.display = 'block';

        const oFReader = new FileReader();
        oFReader.readAsDataURL(image.files[0]);
        oFReader.onload = function (oFREvent) {
            imgPre.src = oFREvent.target.result;
        }
    }

</script>


@endsection
