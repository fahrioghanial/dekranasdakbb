@extends('dashboard.layouts.main')

@section('container')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
  <h1 class="h2">Edit Artikel</h1>
</div>

<div class="col-lg-8 mb-5">
  <form method="post" action="/dashboard/articles/{{ $article->id }}" enctype="multipart/form-data">
    @method('put')
    @csrf
    <div class="mb-3">
      <label for="cover" class="form-label d-block">Cover</label>
      <input type="hidden" name="oldImage" value="{{ $article->cover }}">
      @if ($article->cover)
      <img src="{{ asset('storage/'. $article->cover) }}" class="img-preview img-fluid mb-3">
      @else
      <img class="img-preview img-fluid mb-3">
      @endif
      <input class="form-control @error('cover') is-invalid @enderror" type="file" id="cover" name="cover"
        onchange="previewImage()">
      @error('cover')
      <div class="invalid-feedback">
        {{ $message }}
      </div>
      @enderror
    </div>
    <div class="mb-3">
      <label for="title" class="form-label">Judul</label>
      <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" name="title"
        value="{{ old('title', $article->title) }}">
      @error('title')
      <div class="invalid-feedback">
        {{ $message }}
      </div>
      @enderror
    </div>
    <div class="mb-3">
      <label for="slug" class="form-label">Slug</label>
      <input type="text" class="form-control @error('slug') is-invalid @enderror" id="slug" name="slug"
        value="{{ old('slug', $article->slug) }}" readonly>
      @error('slug')
      <div class="invalid-feedback">
        {{ $message }}
      </div>
      @enderror
    </div>
    <div class="mb-3">
      <label for="content" class="form-label">Konten</label>
      <input id="content" type="hidden" name="content" value="{{ old('content', $article->content) }}">
      <trix-editor input="content"></trix-editor>
      @error('content')
      <div class="invalid-feedback">
        {{ $message }}
      </div>
      @enderror
    </div>

    <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
  </form>
</div>

<script>
  function previewImage() {
    const image = document.querySelector('#cover');
    const imgPreview = document.querySelector('.img-preview');
  
    imgPreview.style.display = 'block';
  
    const oFReader = new FileReader();
    oFReader.readAsDataURL(image.files[0]);
  
    oFReader.onload = function(oFREvent) {
      imgPreview.src = oFREvent.target.result;
    }
  }

  const title = document.querySelector('#title');
  const slug = document.querySelector('#slug');

  title.addEventListener('change', function() {
    fetch('/dashboard/articles/checkSlug?title='+ title.value)
    .then(response => response.json())
    .then(data => slug.value = data.slug)
  })

  document.addEventListener('trix-file-accept', function (e) {
    e.preventDefault();
  })
</script>

@endsection