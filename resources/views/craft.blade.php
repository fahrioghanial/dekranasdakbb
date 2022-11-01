@extends('layouts.main')

@section('navbar')
@include('layouts.navbar', ['categories' => $categories])
@endsection

@section('footer')
@include('layouts.footer')
@endsection

@section('body')
<section id="home" class="mb-32">
  <div class="container m-auto pt-28 text-black px-3 md:px-0">
    @if ($craft->is_confirmed && $craft->craftsman->status_keanggotaan)
    <h1 class="font-bold md:text-5xl text-2xl mb-2">{{ $craft->title }}
      <div class="btn btn-secondary rounded-full hover:bg-slate-700 md:text-2xl text-sm"><a
          href="/crafts?category={{ $craft->category->slug }}">{{
          $craft->category->name }}</a></div>
    </h1>
    <h2 class="font-bold md:text-4xl text-2xl mb-2">Rp{{ $craft->price }}</h2>
    <h1 class="font-semibold md:text-2xl text-xl mb-5">Oleh <a class="hover:text-[#DBC8AC] text-blue-700"
        href="/crafts?craftsman={{ $craft->craftsman->username }}">{{
        $craft->craftsman->name }}</a>
    </h1>
    <div class="flex flex-col md:flex-row md:gap-10 mb-7 bg-white rounded-md items-start">
      <img class="object-cover object-center h-[500px] md:w-1/3 w-full" src="{{ asset('storage/'. $craft->image) }}"
        alt="{{ $craft->title }}" />
      <div class="flex flex-col md:text-xl mt-7 px-5 md:w-1/3">
        <p class="md:text-2xl font-semibold">Rincian Produk</p>
        <h2>Ukuran: {{ $craft->size }}</h2>
        <h2>Warna: {{ $craft->color }}</h2>
        <h2 class="mb-4">Motif: {{ $craft->motive }}</h2>
        <p class="md:text-2xl font-semibold mt-5">Kontak Penjual</p>
        <h2>Telepon: {{ $craft->craftsman->contact }}</h2>
        <h2>Email: {{ $craft->craftsman->email }}</h2>
        <h2>Facebook: {{ $craft->craftsman->facebook }}</h2>
        <h2>Instagram: {{ $craft->craftsman->instagram }}</h2>
        <h2>Twitter: {{ $craft->craftsman->twitter }}</h2>
      </div>
      <div class="flex flex-col md:text-xl my-7 px-5 md:w-1/3">
        <p class="md:text-2xl font-semibold w-full">Kontak Penjual</p>
        <div class="flex md:flex-col flex-row gap-3 flex-wrap">
          <a class="rounded-lg text-white bg-blue-600 md:text-xl py-2 px-3 hover:bg-blue-800 w-fit"
            href="/crafts">Kembali
          </a>
          <a class="rounded-lg text-white bg-blue-600 md:text-xl py-2 px-3 hover:bg-blue-800 w-fit"
            href="/crafts">Kembali
          </a>
          <a class="rounded-lg text-white bg-blue-600 md:text-xl py-2 px-3 hover:bg-blue-800 w-fit"
            href="/crafts">Kembali
          </a>
          <a class="rounded-lg text-white bg-blue-600 md:text-xl py-2 px-3 hover:bg-blue-800 w-fit"
            href="/crafts">Kembali
          </a>
          <a class="rounded-lg text-white bg-blue-600 md:text-xl py-2 px-3 hover:bg-blue-800 w-fit"
            href="/crafts">Kembali
          </a>
          <a class="rounded-lg text-white bg-blue-600 md:text-xl py-2 px-3 hover:bg-blue-800 w-fit"
            href="/crafts">Kembali
          </a>
        </div>
      </div>
    </div>
    <a class="rounded-lg text-white bg-blue-600 md:text-xl py-2 px-3 hover:bg-blue-800 w-fit" href="/crafts">Kembali
    </a>
    @else
    <h1 class="font-bold md:text-4xl text-2xl mb-2">Produk Tidak Ditemukan</h1>
    @endif
</section>
@endsection