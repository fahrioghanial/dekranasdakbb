@extends('dashboard.layouts.main')

@section('container')
@if(session()->has('success'))
<div class="alert alert-success alert-dismissible fade show" role="alert">
  {{ session('success') }}
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
@endif

<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
  <h1 class="h2">Profil Saya</h1>
</div>

<div class="p-5 bg-light">
  <img src="{{ asset('storage/'. $user->profile_picture)  }}" class="img-fluid mt-3" alt="{{ $user->name }}">
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
  <a href="/dashboard/user/{{ $user->id }}/edit" class="btn btn-warning"><span data-feather="edit"></span> Edit</a>
</div>
</div>
@endsection