@extends('layouts.main')

@section('navbar')
@include('layouts.navbar')
@endsection

@section('footer')
@include('layouts.footer')
@endsection

@section('body')
<div class="container mt-4">
  <h1>Produk Kerajinan</h1>
</div>

<div class="py-5 bg-light">
  <div class="container">
    <article>
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
      <a href="/">Back to Home</a>
    </article>
  </div>
</div>
</div>
@endsection