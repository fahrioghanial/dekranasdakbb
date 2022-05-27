@extends('layouts.main')

@section('navbar')
@include('layouts.navbarproduk', ['categories' => $categories])
@endsection

@section('footer')
@include('layouts.footer')
@endsection

@section('body')
<section id="home" class="mb-32">
  <div class="container m-auto pt-28">
    @if ($craft->is_confirmed)
    <h1 class="font-bold md:text-4xl text-2xl mb-10">Produk Kerajinan</h1>
    <h1 class="font-bold md:text-3xl text-xl mb-2">{{ $craft->title }}</h1>
    <h1 class="font-bold md:text-3xl text-xl mb-2">Oleh: <a href="/craftsman/{{ $craft->craftsman->username }}">{{
        $craft->craftsman->name }}</a>
    </h1>
    <h1 class="font-bold md:text-3xl text-xl mb-2">Kategori: <a href="/categories/{{ $craft->category->slug }}">{{
        $craft->category->name }}</a>
    </h1>
    <h2 class="md:text-2xl font-bold mb-4">Harga: {{ $craft->price }}</h2>
    <div class="flex flex-col md:flex-row gap-10">
      <img src="{{ asset('storage/'. $craft->image)  }}" class="md:w-2/3" alt="{{ $craft->title }}">
      <div class="flex flex-col md:text-xl">
        <h2>Kontak: {{ $craft->craftsman->contact }}</h2>
        <h2>Alamat: {{ $craft->craftsman->address }}</h2>
        <h2>Facebook: {{ $craft->craftsman->facebook }}</h2>
        <h2>Instagram: {{ $craft->craftsman->instagram }}</h2>
        <h2>Twitter: {{ $craft->craftsman->twitter }}</h2>
        <h2>Ukuran: {{ $craft->size }}</h2>
        <h2>Warna: {{ $craft->color }}</h2>
        <h2 class="mb-4">Motif: {{ $craft->motive }}</h2>
        <a class="rounded-lg text-white bg-blue-600 md:text-xl py-2 px-3 hover:bg-blue-800 w-fit" href="/crafts">Kembali
        </a>
      </div>
    </div>
    @else
    <h1 class="font-bold md:text-4xl text-2xl mb-2">Produk Tidak Ditemukan</h1>
    @endif
</section>
@endsection