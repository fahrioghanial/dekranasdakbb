@extends('layouts.main')

@section('navbar')
@include('layouts.navbar')
@endsection

@section('footer')
@include('layouts.footer')
@endsection

@section('body')
<section id="home" class="mb-32">
  <div class="container m-auto pt-24 text-black px-3 md:px-0">
    <h1 class="font-bold md:text-4xl text-2xl mb-10">Anggota Kami</h1>
    <h1 class="font-bold md:text-3xl text-xl mb-5">{{ $title }}</h1>
    <form action="/member" class="mb-3">
      <div class="flex w-1/2">
        <input type="text" name="search"
          class="input input-bordered rounded-r-none border-r-none bg-white md:w-4/5 text-black" id="search"
          placeholder="Cari Anggota Perajin..." value="{{ request('search') }}">
        <button
          class="bg-[#e00024] py-2 px-3 hover:bg-[#FF9684] rounded-l-none border-l-none rounded-lg text-white text-xl font-semibold"
          type="submit">Cari</button>
      </div>
    </form>
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 items-stretch">
      @if ($users->count())
      @foreach ($users as $user)
      <div class="card card-compact w-full bg-white shadow-xl">
        <img class="object-cover object-center h-52 w-52 mx-auto"
          src="{{ asset('storage/'. $user->identity->profile_picture) }}" alt="{{ $user->username }}" />
        <div class="card-body">
          <h2 class="card-title">{{ $user->name }}</h2>
          <p class="text-md font-semibold">Nama Usaha: {{ $user->business_name }}</p>
          <p class="text-md font-semibold">{{ $user->territory->kelurahan_desa }}</p>
          <p class="text-md font-semibold"><i class="bi bi-whatsapp"></i> {{ $user->identity->whatsapp }}</p>
          <p class="text-md font-semibold"><i class="bi bi-facebook"></i> {{ $user->identity->facebook }}</p>
          <p class="text-md font-semibold"><i class="bi bi-instagram"></i> {{ $user->identity->instagram }}</p>
          <div class="card-actions mt-3">
            <a class="rounded-lg text-white bg-[#e00024] md:text-xl py-2 px-3 hover:bg-[#FF9684] w-fit"
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