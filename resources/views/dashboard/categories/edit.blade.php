@extends('dashboard.layouts.main')

@section('container')
<div class="mx-2 md:ml-80 pt-24 h-screen pb-5 md:mr-5 text-white">
  <p class="text-2xl font-semibold mb-5">Ubah Kategori</p>
  <div class="md:w-1/2 bg-white p-3 rounded-md">
    <form method="post" action="/dashboard/categories/{{ $category->id }}" enctype="multipart/form-data">
      @method('put')
      @csrf
      <div class="form-control w-full">
        <label class="label">
          <span class="label-text text-black">Nama Kategori</span>
        </label>
        <input type="text" name="name"
          class="input input-bordered w-full {{ $errors->has('name')?'border-rose-500':'border-black' }} border-1 bg-white text-black"
          id="name" placeholder="Nama Kategori" autofocus value="{{ old('name', $category->name) }}">
        @error('name')
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
          id="slug" value="{{ old('slug', $category->slug) }}" readonly>
        @error('slug')
        <div class="text-rose-500">
          {{ $message }}
        </div>
        @enderror
      </div>
      <div class="flex flex-col gap-3 mt-5">
        <button class="bg-blue-600 py-2 px-3 hover:bg-blue-900 rounded-lg w-full text-white text-xl font-semibold"
          type="submit">Simpan</button>
        <a class="rounded-lg py-2 px-3 bg-red-600 hover:bg-red-900 text-white text-xl font-semibold text-center"
          href="/dashboard/categories">
          Batal
        </a>
      </div>
    </form>
  </div>
</div>

<script>
  // const name = document.querySelector('#name');
  // const slug = document.querySelector('#slug');

  // name.addEventListener('change', function() {
  //   fetch('/dashboard/categories/checkSlug?name='+ name.value)
  //   .then(response => response.json())
  //   .then(data => slug.value = data.slug)
  // })
  document.querySelector('#name').addEventListener('change', (event) => {
    fetch('/dashboard/categories/checkSlug?name='+ document.querySelector('#name').value)
    .then(response => response.json())
    .then(data => {document.querySelector('#slug').value = data.slug; console.log(data)})
  })
</script>
@endsection