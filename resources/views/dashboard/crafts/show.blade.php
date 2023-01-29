@extends('dashboard.layouts.main')

@section('container')

<div class="mx-2 md:ml-80 pt-24 pb-5 md:mr-5 text-white">
  <p class="text-2xl font-semibold mb-5">Kerajinan Saya</p>
  <div class="flex flex-col md:flex-row mb-7 bg-slate-900 rounded-md items-center pt-5 md:pt-0 md:pl-5">
    <img src="{{ asset('storage/'. $craft->image)  }}" class="w-1/2 md:w-1/3 rounded-md" alt="{{ $craft->title }}">
    <div class="card-body md:text-xl">
      <h1>Judul: {{ $craft->title }}</h1>
      <h2>Deskripsi: {{ $craft->description }}</h2>
      <h1>Kategori: {{ $craft->category->name }}</h1>
      <h2>Harga: Rp{{ $craft->price }}</h2>
      <h2>Pembuat: {{ $craft->craftsman->name }}</h2>
      <h2>Nama Usaha: {{ $craft->craftsman->business_name }}</h2>
      <h2>Kontak: {{ $craft->craftsman->identity->phone }}</h2>
      <h2>Alamat: {{ $craft->craftsman->identity->address }}</h2>
      <div class="card-actions justify-end">
        <a href="/dashboard/crafts/" class="btn bg-blue-600 text-white border-0 w-full md:w-fit">Kembali</a>
        <a href="/dashboard/crafts/{{ $craft->id }}/edit"
          class="btn bg-yellow-600 text-white border-0 w-full md:w-fit">Ubah</a>
        <form action="/dashboard/crafts/{{ $craft->id }}" method="post" class="w-full md:w-fit">
          @method('delete')
          @csrf
          <button class="btn bg-red-600 text-white border-0 w-full md:w-fit"
            onclick="return confirm('Hapus Kerajinan?')">Hapus</button>
        </form>
      </div>
    </div>
  </div>
</div>
@endsection