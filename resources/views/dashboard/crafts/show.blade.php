@extends('dashboard.layouts.main')

@section('container')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
  <h1 class="h2">Kerajinan Saya</h1>
</div>

<div class="p-5 bg-light">
  <h1>Judul: {{ $craft->title }}</h1>
  <h1>Kategory:
    <a href="/categories/{{ $craft->category->slug }}">{{ $craft->category->name }}</a>
  </h1>
  <h2>Harga: {{ $craft->price }}</h2>
  <h2>Pembuat: <a href="/craftsman/{{ $craft->craftsman->username }}">{{ $craft->craftsman->name }}</a></h2>
  <h2>Kontak: {{ $craft->craftsman->contact }}</h2>
  <h2>Alamat: {{ $craft->craftsman->address }}</h2>
  <h2>Media Sosial: {{ $craft->craftsman->social_media }}</h2>
  <h2>Ukuran: {{ $craft->size }}</h2>
  <h2>Warna: {{ $craft->color }}</h2>
  <h2>Motif: {{ $craft->motive }}</h2>
  <a href="/dashboard/crafts/" class="btn btn-success"><span data-feather="arrow-left"></span> Kembali</a>
  <a href="/dashboard/crafts/{{ $craft->id }}/edit" class="btn btn-warning"><span data-feather="edit"></span> Edit</a>
  <form action="/dashboard/crafts/{{ $craft->id }}" method="post" class="d-inline">
    @method('delete')
    @csrf
    <button class="btn btn-danger" onclick="return confirm('Hapus Kerajinan?')"><span data-feather="x-circle"></span>
      Hapus</button>
  </form>
</div>
</div>
@endsection