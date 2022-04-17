@extends('dashboard.layouts.main')

@section('container')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
  <h1 class="h2">Buat Kerajinan Baru</h1>
</div>

<div class="col-lg-8 mb-5">
  <form method="post" action="/dashboard/crafts">
    @csrf
    <div class="mb-3">
      <label for="title" class="form-label">Judul</label>
      <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" name="title"
        value="{{ old('title') }}">
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
        @if(old('category_id') == $category->id)
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
        value="{{ old('price') }}">
      @error('price')
      <div class="invalid-feedback">
        {{ $message }}
      </div>
      @enderror
    </div>
    <div class="mb-3">
      <label for="size" class="form-label">Ukuran</label>
      <input type="text" class="form-control" id="size" name="size" value="{{ old('size') }}">
    </div>
    <div class="mb-3">
      <label for="color" class="form-label">Warna</label>
      <input type="text" class="form-control" id="color" name="color" value="{{ old('color') }}">
    </div>
    <div class="mb-3">
      <label for="motive" class="form-label">Motif</label>
      <input type="text" class="form-control" id="motive" name="motive" value="{{ old('motive') }}">
    </div>
    <button type="submit" class="btn btn-primary">Simpan</button>
  </form>
</div>

@endsection