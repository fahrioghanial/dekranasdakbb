@extends('dashboard.layouts.main')

@section('container')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
  <h1 class="h2">Kerajinan {{ $craft->craftsman->name }}</h1>
</div>

<div class="p-5 bg-light">
  <img src="{{ asset('storage/'. $craft->image)  }}" class="img-fluid mt-3" alt="{{ $craft->title }}">
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
  <a href="/dashboard/craftsadmin/" class="btn btn-success"><span data-feather="arrow-left"></span> Kembali</a>
</div>
</div>
@endsection