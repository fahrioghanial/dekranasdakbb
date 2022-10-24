@extends('dashboard.layouts.main')

@section('container')
<div class="mx-2 md:ml-80 pt-24 pb-5 md:mr-5 text-white">
  <p class="text-2xl font-semibold mb-5">Profil {{ $user->name }}</p>
  <div class="flex flex-col md:flex-row mb-7 bg-slate-900 rounded-md items-center pt-5 md:pt-0 md:pl-5">
    <img src="{{ asset('storage/'. $user->profile_picture)  }}" class="w-1/2 md:w-1/3 rounded-md"
      alt="{{ $user->name }}">
    <div class="card-body md:text-xl">
      <h2>Nama Lengkap: {{ $user->name }}</h2>
      <h2>Username (Nama Pengguna): {{ $user->username }} </h2>
      <h2>Status Keanggotaan: {{ $user->status_keanggotaan? "Diterima" : "Menunggu Persetujuan" }} </h2>
      <h2>Email: {{ $user->email }}</h2>
      <h2>Nomor HP: {{ $user->contact }}</h2>
      <h2>Nomor KTP: {{ $user->noktp }}</h2>
      <h2>Alamat: {{ $user->address }}</h2>
      <h2>RT: {{ $user->rt }}</h2>
      <h2>RW: {{ $user->rw }}</h2>
      <h2>Kecamatan: {{ $user->kecamatan }}</h2>
      <h2>Kelurahan/Desa: {{ $user->kelurahan_desa }}</h2>
      <h2>Kode Pos: {{ $user->kodepos }}</h2>
      <h2>Facebook: {{ $user->facebook }}</h2>
      <h2>Instagram: {{ $user->instagram }}</h2>
      <h2>Twitter: {{ $user->twitter }}</h2>
      <div class="card-actions justify-end">
        <a href="/dashboard/adminuser" class="btn btn-info">
          Kembali</a>
        @if ($user->status_keanggotaan)
        <a href="/dashboard/adminuser/membership/{{ $user->username }}" class="btn btn-error">
          Cabut Keanggotaan</a>
        @else
        <a href="/dashboard/adminuser/membership/{{ $user->username }}" class="btn btn-success">
          Terima</a>
        @endif
      </div>
    </div>
  </div>

  {{-- <div class="p-5 bg-light">
    <img src="{{ asset('storage/'. $user->profile_picture)  }}" class="img-fluid mt-3" alt="{{ $user->name }}">
    <h2>Nama Lengkap: {{ $user->name }}</h2>
    <h2>Username (Nama Pengguna): {{ $user->username }} </h2>
    <h2>Email: {{ $user->email }}</h2>
    <h2>Nomor HP: {{ $user->contact }}</h2>
    <h2>Nomor KTP: {{ $user->noktp }}</h2>
    <h2>Alamat: {{ $user->address }}</h2>
    <h2>RT: {{ $user->rt }}</h2>
    <h2>RW: {{ $user->rw }}</h2>
    <h2>Kecamatan: {{ $user->kecamatan }}</h2>
    <h2>Kelurahan/Desa: {{ $user->kelurahan_desa }}</h2>
    <h2>Kode Pos: {{ $user->kodepos }}</h2>
    <h2>Facebook: {{ $user->facebook }}</h2>
    <h2>Instagram: {{ $user->instagram }}</h2>
    <h2>Twitter: {{ $user->twitter }}</h2>
    <a href="/dashboard/adminuser" class="btn btn-info"><span data-feather="arrow-left"></span>
      Kembali</a>
    @if ($user->status_keanggotaan)
    <a href="/dashboard/adminuser/membership/{{ $user->username }}" class="btn btn-danger"><span
        data-feather="x-circle"></span>
      Cabut Keanggotaan</a>
    @else
    <a href="/dashboard/adminuser/membership/{{ $user->username }}" class="btn btn-success"><span
        data-feather="check-circle"></span>
      Terima</a>
    @endif
  </div> --}}
</div>
@endsection