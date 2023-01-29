@extends('dashboard.layouts.main')
@section('container')
<div class="mx-2 lg:ml-80 pt-24 pb-5 lg:mr-5 text-white">
  @if(session()->has('success'))
  <div class="alert alert-success mb-3">
    {{ session('success') }}
  </div>
  @endif
  <p class="text-2xl font-semibold mb-5">Profil Saya</p>
  <div class="flex flex-col md:flex-row mb-7 bg-slate-900 rounded-md items-center pt-5 md:pt-0 md:pl-5">
    <img class="object-cover object-center w-72 mx-auto"
      src="{{ asset('storage/'. $user->identity->profile_picture)  }}" alt="{{ $user->name }}" />
    <div class="card-body md:text-xl">
      <h2>Nama Lengkap: {{ $user->name }}</h2>
      <h2>Nama Usaha: {{ $user->business_name }}</h2>
      {{-- <h2>Username (Nama Pengguna): {{ $user->username }} </h2> --}}
      <h2>Status Keanggotaan: {{ $user->status_keanggotaan? "Diterima" : "Menunggu Persetujuan" }} </h2>
      <h2>Email: {{ $user->email }}</h2>
      <h2>Nomor HP: {{ $user->identity->phone }}</h2>
      <h2>Nomor KTP: {{ $user->identity->noktp }}</h2>
      <h2>Alamat: {{ $user->identity->address }}</h2>
      <h2>RT: {{ $user->identity->rt }}</h2>
      <h2>RW: {{ $user->identity->rw }}</h2>
      <h2>Kecamatan: {{ $user->territory->kecamatan }}</h2>
      <h2>Kelurahan/Desa: {{ $user->territory->kelurahan_desa }}</h2>
      <h2>Kode Pos: {{ $user->territory->kodepos }}</h2>
      <h2>Facebook: {{ $user->identity->facebook }}</h2>
      <h2>Instagram: {{ $user->identity->instagram }}</h2>
      <h2>Whatsapp: {{ $user->identity->whatsapp }}</h2>
      <div class="card-actions justify-end">
        <a href="/dashboard/user/{{ $user->id }}/edit" class="btn btn-warning">Ubah</a>
      </div>
    </div>
  </div>
</div>
@endsection