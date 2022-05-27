@extends('dashboard.layouts.main')

@section('container')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
  <h1 class="h2">Edit Kerajinan</h1>
</div>

<div class="col-lg-8 mb-5">
  <form method="post" action="/dashboard/crafts/{{ $craft->id }}" enctype="multipart/form-data">
    @method('put')
    @csrf
    <div class="mb-3">
      <label for="image" class="form-label d-block">Foto Kerajinan</label>
      <input type="hidden" name="oldImage" value="{{ $craft->image }}">
      @if ($craft->image)
      <img src="{{ asset('storage/'. $craft->image) }}" class="img-preview img-fluid mb-3">
      @else
      <img class="img-preview img-fluid mb-3">
      @endif
      <input class="form-control @error('image') is-invalid @enderror" type="file" id="image" name="image"
        onchange="previewImage()">
      @error('image')
      <div class="invalid-feedback">
        {{ $message }}
      </div>
      @enderror
    </div>
    <div class="mb-3">
      <label for="title" class="form-label">Judul</label>
      <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" name="title"
        value="{{ old('title', $craft->title) }}">
      @error('title')
      <div class="invalid-feedback">
        {{ $message }}
      </div>
      @enderror
    </div>
    <div class="mb-3">
      <label for="category_id" class="form-label">Kategori</label>
      <select class="form-select" name="category_id">
        @foreach($categories as $category)
        @if(old('category_id', $craft->category_id) == $category->id)
        <option value="{{ $category->id }}" selected>{{ $category->name }}</option>
        @else
        <option value="{{ $category->id }}">{{ $category->name }}</option>
        @endif
        @endforeach
      </select>
    </div>
    <div class="mb-3">
      <label for="price" class="form-label">Harga</label>
      <input type="text" class="form-control @error('price') is-invalid @enderror" id="price" name="price"
        value="{{ old('price', $craft->price) }}">
      @error('price')
      <div class="invalid-feedback">
        {{ $message }}
      </div>
      @enderror
    </div>
    <div class="mb-3">
      <label for="size" class="form-label">Ukuran</label>
      <input type="text" class="form-control" id="size" name="size" value="{{ old('size',$craft->size) }}">
    </div>
    <div class="mb-3">
      <label for="color" class="form-label">Warna</label>
      <input type="text" class="form-control" id="color" name="color" value="{{ old('color', $craft->color) }}">
    </div>
    <div class="mb-3">
      <label for="motive" class="form-label">Motif</label>
      <input type="text" class="form-control" id="motive" name="motive" value="{{ old('motive', $craft->motive) }}">
    </div>
    <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
  </form>
</div>

<script>
  function previewImage() {
    const image = document.querySelector('#image');
    const imgPreview = document.querySelector('.img-preview');
  
    imgPreview.style.display = 'block';
  
    const oFReader = new FileReader();
    oFReader.readAsDataURL(image.files[0]);
  
    oFReader.onload = function(oFREvent) {
      imgPreview.src = oFREvent.target.result;
    }
  }
</script>

@endsection