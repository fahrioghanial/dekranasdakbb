@extends('layouts.main', ['title' => $craft->title." - ".$craft->craftsman->name])

@section('navbar')
@include('layouts.navbar', ['categories' => $categories])
@endsection

@section('footer')
@include('layouts.footer')
@endsection

@section('body')
<section id="home" class="mb-32">
  <div class="container m-auto pt-24 text-black px-3 md:px-0">
    @if ($craft->is_confirmed && $craft->craftsman->status_keanggotaan)
    <h1 class="font-bold md:text-5xl text-2xl mb-2">{{ $craft->title }}
      <div class="btn btn-secondary rounded-full hover:bg-slate-700 md:text-2xl text-sm"><a
          href="/crafts?category={{ $craft->category->slug }}">{{
          $craft->category->name }}</a></div>
    </h1>
    <h2 class="font-bold md:text-4xl text-2xl mb-2">Rp{{ $craft->price }}</h2>
    <h1 class="font-semibold md:text-2xl text-xl mb-5">Oleh <a class="hover:text-[#DBC8AC] text-blue-700"
        href="/crafts?craftsman={{ $craft->craftsman->username }}">{{
        $craft->craftsman->business_name}}</a>
    </h1>
    <div class="flex flex-col md:flex-row md:gap-10 mb-7 bg-white rounded-md items-start">
      <img class="object-cover object-center md:rounded-l-md h-[500px] md:w-1/2 w-full"
        src="{{ asset('storage/'. $craft->image) }}" alt="{{ $craft->title }}" />
      <div class="flex flex-col md:text-xl mt-6 ml-5 md:ml-0 md:w-1/4">
        <p class="md:text-2xl font-semibold">Deskripsi</p>
        <p>{{ $craft->description }}</p>
        <p class="md:text-2xl font-semibold mt-4">Kontak Penjual</p>
        <h2>Nama: {{ $craft->craftsman->name }}</h2>
        <h2>Telepon: {{ $craft->craftsman->contact }}</h2>
        <h2>Whatsapp: {{ $craft->craftsman->whatsapp }}</h2>
        <h2>Email: {{ $craft->craftsman->email }}</h2>
        <h2>Facebook: {{ $craft->craftsman->facebook }}</h2>
        <h2>Instagram: {{ $craft->craftsman->instagram }}</h2>
      </div>
      <div class="flex flex-col md:text-md my-7 ml-5 md:ml-0 md:w-1/4">
        <div class="flex md:flex-col flex-row gap-3 flex-wrap">
          <a class="rounded-lg text-white bg-green-500 py-2 px-3 hover:bg-opacity-50 w-fit"
            @if(@isset($craft->craftsman->whatsapp))
            href="https://wa.me/{{ $whatsapp
            }}?text=Saya%20tertarik%20untuk%20membeli%20kerajinan%20anda%20pada%20Dekranasda%20KBB.%0aNama%20kerajinan:%20{{
            $craft->title }}"
            @else
            href="#"
            @endif
            ><i class="bi bi-whatsapp"></i> Pesan
            Melalui Whatsapp
          </a>
          <a class="rounded-lg text-white bg-red-600 py-2 px-3 hover:bg-opacity-50 w-fit"
            @if(@isset($craft->craftsman->email))
            href="mailto:{{ $craft->craftsman->email
            }}?subject=Pesan%20Kerajinan%20Dekranasda%20KBB&body=Saya%20tertarik%20untuk%20membeli%20kerajinan%20anda%20pada%20Dekranasda%20KBB.%0aNama%20kerajinan:%20{{
            $craft->title }}"
            @else
            href="#"
            @endif
            ><i class="bi bi-envelope"></i> Pesan
            Melalui Email
          </a>
          <a class="rounded-lg text-white bg-purple-600 py-2 px-3 hover:bg-opacity-50 w-fit"
            @if(@isset($craft->craftsman->instagram))
            href="https://ig.me/m/{{ $craft->craftsman->instagram }}"
            @else
            href="#"
            @endif
            ><i class="bi bi-instagram"></i> Pesan
            Melalui Instagram
          </a>
          <a class="rounded-lg text-white bg-blue-600 py-2 px-3 hover:bg-opacity-50 w-fit"
            @if(@isset($craft->craftsman->facebook))
            href="https://m.me/{{ $craft->craftsman->facebook }}"
            @else
            href="#"
            @endif
            ><i class="bi bi-facebook"></i> Pesan
            Melalui Facebook
          </a>
          <a class="rounded-lg text-white bg-gray-500 py-2 px-3 hover:bg-opacity-50 w-fit"
            @if(@isset($craft->craftsman->contact))
            href="tel:{{ $contact }}"
            @else
            href="#"
            @endif
            ><i class="bi bi-telephone"></i> Pesan
            Melalui Telepon
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