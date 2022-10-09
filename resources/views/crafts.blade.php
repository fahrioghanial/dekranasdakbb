@extends('layouts.main')

@section('navbar')
@include('layouts.navbar', ['categories' => $categories])
@endsection

@section('footer')
@include('layouts.footer')
@endsection

@section('body')
<section id="home" class="mb-32">
  <div class="container m-auto pt-28">
    <h1 class="font-bold md:text-4xl text-2xl mb-2">Produk Kerajinan</h1>
    <h1 class="font-bold md:text-3xl text-xl mb-10">{{ $title }}</h1>
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
      @if ($crafts->count())
      @foreach ($crafts as $craft)
      <div class="flex flex-col px-4 py-4 bg-white shadow-md rounded-lg">
        <img src="{{ asset('storage/'. $craft->image) }}" alt="{{ $craft->title }}" class="w-full mx-auto mb-4" />
        <p class="text-xl md:text-2xl font-bold mb-2">{{ $craft->title }}</p>
        <p class="text-xl font-semibold">{{ $craft->price }}</p>
        <a href="/categories/{{ $craft->category->slug }}">Kategori: {{ $craft->category->name }}</a>
        <a href="/craftsman/{{ $craft->craftsman->username }}">Oleh: {{ $craft->craftsman->name
          }}</a>
        <div class="flex flex-row justify-between items-center mt-3">
          <a class="rounded-lg text-white bg-blue-600 md:text-xl py-2 px-3 hover:bg-blue-800 w-fit"
            href="/detail/{{ $craft->id }}">
            Detail
          </a>
          <p class="text-sm">{{ $craft->created_at->diffForHumans() }}</p>
        </div>
      </div>
      @endforeach
      @else
      <h1 class="font-bold md:text-4xl text-2xl mb-2">Produk Tidak Ditemukan</h1>
      @endif
    </div>
</section>
@endsection