@extends('layouts.main')

@section('navbar')
@include('layouts.navbar')
@endsection

@section('footer')
@include('layouts.footer')
@endsection

@section('body')
<section id="home" class="mb-32">
  <div class="container m-auto pt-28 text-black">
    <h1 class="font-bold md:text-4xl text-2xl mb-10">Anggota Kami</h1>
    <h1 class="font-bold md:text-3xl text-xl mb-5">{{ $title }}</h1>
    <form action="/member" class="mb-3">
      <div class="flex w-1/2">
        <input type="text" name="search" class="input input-bordered bg-white w-4/5 text-black" id="search"
          placeholder="Cari Anggota Perajin..." value="{{ request('search') }}">
        <button class="bg-blue-600 py-2 px-3 hover:bg-blue-900 rounded-lg text-white text-xl font-semibold"
          type="submit">Cari</button>
      </div>
    </form>
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 items-start">
      @if ($users->count())
      @foreach ($users as $user)
      <div class="card card-compact w-full bg-white shadow-xl">
        <figure><img class="w-1/2" src="{{ asset('storage/'. $user->profile_picture) }}" alt="{{ $user->username }}" />
        </figure>
        <div class="card-body">
          <h2 class="card-title">{{ $user->name }}</h2>
          <p class="text-md font-semibold">{{ $user->kelurahan_desa }}</p>
          <p class="text-md font-semibold"><i class="bi bi-facebook"></i> {{ $user->facebook }}</p>
          <p class="text-md font-semibold"><i class="bi bi-instagram"></i> {{ $user->instagram }}</p>
          <p class="text-md font-semibold"><i class="bi bi-twitter"></i> {{ $user->twitter }}</p>
          <div class="card-actions mt-3">
            <a class="rounded-lg text-white bg-blue-600 md:text-xl py-2 px-3 hover:bg-blue-800 w-fit"
              href="/crafts?craftsman={{ $user->username }}">
              Lihat Produk
            </a>
          </div>
        </div>
      </div>
      @endforeach
      @else
      <h1 class="font-bold md:text-4xl text-2xl mb-2">Anggota Tidak Ditemukan</h1>
      @endif
    </div>
    {{ $users->links() }}
  </div>
</section>
@endsection