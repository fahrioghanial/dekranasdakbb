@extends('dashboard.layouts.main')

@section('container')
<div class="mx-2 md:ml-80 pt-24 pb-5 md:mr-5 text-white">
  <p class="text-2xl font-semibold mb-5">Ubah Artikel</p>
  <div class="md:w-1/2 bg-white p-3 rounded-md">
    <form method="post" action="/dashboard/articles/{{ $article->id }}" enctype="multipart/form-data">
      @method('put')
      @csrf
      <div class="form-control w-full">
        <label class="label">
          <span class="label-text text-black">Cover</span>
        </label>
        <input type="hidden" name="oldImage" value="{{ $article->cover }}">
        @if ($article->cover)
        <img src="{{ asset('storage/'. $article->cover) }}" class="img-preview w-1/2">
        @else
        <img class="img-preview w-1/2">
        @endif
        <input type="file" name="cover" class="p-2 rounded-md w-full @error('cover') border-red-600 @enderror bg-white"
          id="cover" placeholder="Cover" onchange="previewImage()">
        @error('cover')
        <div class="text-rose-500">
          {{ $message }}
        </div>
        @enderror
      </div>
      <div class="form-control w-full">
        <label class="label">
          <span class="label-text text-black">Judul Artikel</span>
        </label>
        <input type="text" name="title"
          class="input input-bordered w-full {{ $errors->has('title')?'border-rose-500':'border-black' }} border-1 bg-white text-black"
          id="title" placeholder="Judul Artikel" autofocus value="{{ old('title', $article->title) }}">
        @error('title')
        <div class="text-rose-500">
          {{ $message }}
        </div>
        @enderror
      </div>
      <div class="form-control w-full">
        <label class="label">
          <span class="label-text text-black">Slug</span>
        </label>
        <input type="text" name="slug"
          class="input input-bordered w-full {{ $errors->has('slug')?'border-rose-500':'border-black' }} border-1 bg-white text-black"
          id="slug" value="{{ old('slug', $article->slug) }}" readonly>
        @error('slug')
        <div class=" text-rose-500">
          {{ $message }}
        </div>
        @enderror
      </div>
      <div class="form-control w-full">
        <label class="label">
          <span class="label-text text-black">Konten</span>
        </label>
        <input id="content" type="hidden" name="content" value="{{ old('content', $article->content) }}" class="">
        <trix-editor input="content" class="text-black"></trix-editor>
        @error('content')
        <div class="text-rose-500">
          {{ $message }}
        </div>
        @enderror
      </div>
      <div class="flex flex-col gap-3 mt-5">
        <button class="bg-blue-600 py-2 px-3 hover:bg-blue-900 rounded-lg w-full text-white text-xl font-semibold"
          type="submit">Simpan Perubahan</button>
        <a class="rounded-lg py-2 px-3 bg-red-600 hover:bg-red-900 text-white text-xl font-semibold text-center"
          href="/dashboard/articles">
          Batal
        </a>
      </div>
    </form>
  </div>
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

  // const title = document.querySelector('#title');
  // const slug = document.querySelector('#slug');

  document.querySelector('#title').addEventListener('change', function() {
    fetch('/dashboard/articles/checkSlug?title='+ document.querySelector('#title').value)
    .then(response => response.json())
    .then(data => document.querySelector('#slug').value = data.slug)
  })

  document.addEventListener('trix-file-accept', function (e) {
    e.preventDefault();
  })
</script>

@endsection