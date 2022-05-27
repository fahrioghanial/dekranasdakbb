@extends('layouts.main')

@section('navbar')
@include('layouts.navbar')
@endsection

@section('footer')
@include('layouts.footer')
@endsection

@section('body')
<section id="home" class="mb-32">
  <div class="container m-auto pt-28">
    <h1 class="font-bold md:text-4xl text-2xl mb-2">Anggota Kami</h1>
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
      @if ($users->count())
      @foreach ($users as $user)
      <div class="flex flex-col px-4 py-4 bg-white shadow-md rounded-lg">
        <img src="{{ asset('storage/'. $user->profile_picture) }}" alt="{{ $user->username }}"
          class="w-full mx-auto mb-4" />
        <p class="text-xl md:text-2xl font-bold mb-2">{{ $user->name }}</p>
        <p class="text-lg font-semibold">{{ $user->kelurahan_desa }}</p>
        <p class="text-lg font-semibold"><i class="bi bi-facebook"></i> {{ $user->facebook }}</p>
        <p class="text-lg font-semibold"><i class="bi bi-instagram"></i> {{ $user->instagram }}</p>
        <p class="text-lg font-semibold"><i class="bi bi-twitter"></i> {{ $user->twitter }}</p>
        <div class="mt-3">
          <a class="rounded-lg text-white bg-blue-600 md:text-xl py-2 px-3 hover:bg-blue-800 w-fit"
            href="/craftsman/{{ $user->username }}">
            Lihat Produk
          </a>
        </div>
      </div>
      @endforeach
      @else
      <h1 class="font-bold md:text-4xl text-2xl mb-2">Anggota Tidak Ditemukan</h1>
      @endif
    </div>
</section>
@endsection