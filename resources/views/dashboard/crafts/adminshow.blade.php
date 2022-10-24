@extends('dashboard.layouts.main')

@section('container')

<div class="mx-2 md:ml-80 pt-24 pb-5 md:mr-5 text-white">
  <p class="text-2xl font-semibold mb-5">Kerajinan {{ $craft->craftsman->name }}</p>
  <div class="flex flex-col md:flex-row mb-7 bg-slate-900 rounded-md items-center pt-5 md:pt-0 md:pl-5">
    <img src="{{ asset('storage/'. $craft->image)  }}" class="w-1/2 md:w-1/3 rounded-md" alt="{{ $craft->title }}">
    <div class="card-body md:text-xl">
      <h1>Judul: {{ $craft->title }}</h1>
      <h1>Kategori: {{ $craft->category->name }}</h1>
      <h2>Harga: Rp{{ $craft->price }}</h2>
      <h2>Pembuat: {{ $craft->craftsman->name }}</h2>
      <h2>Kontak: {{ $craft->craftsman->contact }}</h2>
      <h2>Alamat: {{ $craft->craftsman->address }}</h2>
      <h2>Ukuran: {{ $craft->size }}</h2>
      <h2>Warna: {{ $craft->color }}</h2>
      <h2>Motif: {{ $craft->motive }}</h2>
      <div class="card-actions justify-end">
        <a href="/dashboard/craftsadmin/" class="btn btn-info">Kembali</a>
        @if ($craft->is_confirmed)
        <a href="/dashboard/crafts/admin/{{ $craft->id }}" class="btn btn-error">
          Batalkan Persetujuan</a>
        @else
        <a href="/dashboard/crafts/admin/{{ $craft->id }}" class="btn btn-success">
          Setujui</a>
        @endif
      </div>
    </div>
  </div>
</div>
@endsection