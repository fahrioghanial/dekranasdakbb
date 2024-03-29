@extends('dashboard.layouts.main')

@section('container')
<div class="mx-2 md:ml-80 pt-24 pb-5 md:mr-5 text-white">
  <p class="text-2xl font-semibold mb-5">Ubah Kerajinan</p>
  <div class="md:w-1/2 bg-white p-3 rounded-md">
    <form method="post" action="/dashboard/craftsadmin/editcraft/{{ $craft->id }}" enctype="multipart/form-data">
      @method('put')
      @csrf
      <div class="form-control w-full">
        <label class="label">
          <span class="label-text text-black">Foto Kerajinan</span>
        </label>
        <input type="hidden" name="oldImage" value="{{ $craft->image }}">
        @if ($craft->image)
        <img src="{{ asset('storage/'. $craft->image) }}" class="img-preview w-1/2">
        @else
        <img class="img-preview w-1/2">
        @endif
        <input type="file" name="image" class="p-2 rounded-md w-full @error('image') border-red-600 @enderror bg-white"
          id="image" placeholder="Foto Kerajinan" onchange="previewImage()">
        @error('image')
        <div class="text-rose-500">
          {{ $message }}
        </div>
        @enderror
      </div>
      <div class="form-control w-full">
        <label class="label">
          <span class="label-text text-black">Judul</span>
        </label>
        <input type="text" name="title"
          class="input input-bordered w-full {{ $errors->has('title')?'border-rose-500':'border-black' }} border-1 bg-white text-black"
          id="title" placeholder="Judul Kerajinan" autofocus value="{{ old('title', $craft->title) }}">
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
          class="input input-bordered w-full {{ $errors->has('slug')?'border-rose-500':'border-black' }} border-1 bg-slate-200 text-black"
          id="slug" value="{{ old('slug', $craft->slug) }}" readonly>
        @error('slug')
        <div class="text-rose-500">
          {{ $message }}
        </div>
        @enderror
      </div>
      <div class="form-control w-full">
        <label class="label">
          <span class="label-text text-black">Kategori</span>
        </label>
        <select class="select border-black border-1 bg-white text-base text-black" name="category_id">
          @foreach($categories as $category)
          @if(old('category_id', $craft->category_id) == $category->id)
          <option value="{{ $category->id }}" selected>{{ $category->name }}</option>
          @else
          <option value="{{ $category->id }}">{{ $category->name }}</option>
          @endif
          @endforeach
        </select>
      </div>
      <div class="form-control w-full">
        <label class="label">
          <span class="label-text text-black">Harga (Tuliskan tanpa (Rp) dan titik)</span>
          <span class="label-text text-xs text-black">Contoh: 120000</span>
        </label>
        <input type="text" name="price"
          class="input input-bordered w-full {{ $errors->has('price')?'border-rose-500':'border-black' }} border-1 bg-white text-black"
          id="price" placeholder="Harga" value="{{ old('price', $craft->price) }}">
        @error('price')
        <div class="text-rose-500">
          {{ $message }}
        </div>
        @enderror
      </div>
      <div class="form-control w-full">
        <label class="label">
          <span class="label-text text-black">Deskripsi</span>
        </label>
        <textarea name="description" class="input input-bordered w-full border-black border-1 bg-white text-black"
          id="description" placeholder="Deskripsi"
          value="{{ old('description', $craft->description) }}">{{ old('description', $craft->description) }}</textarea>
      </div>
      <div class="flex flex-col gap-3 mt-5">
        <button class="bg-blue-600 py-2 px-3 hover:bg-blue-900 rounded-lg w-full text-white text-xl font-semibold"
          type="submit">Simpan Perubahan</button>
        <a class="rounded-lg py-2 px-3 bg-red-600 hover:bg-red-900 text-white text-xl font-semibold text-center"
          href="/dashboard/craftsadmin">
          Batal
        </a>
      </div>
    </form>
  </div>
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

  document.querySelector('#title').addEventListener('change', (event) => {
    fetch('/dashboard/crafts/checkSlug?title='+ document.querySelector('#title').value)
    .then(response => response.json())
    .then(data => {document.querySelector('#slug').value = data.slug; console.log(data)})
  })
</script>

@endsection