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
  <h1>Nama Lengkap: {{ $user->name }}</h1>
  <h1>Username (Nama Pengguna): {{ $user->username }} </h1>
  <h2>Email: {{ $user->email }}</h2>
  <h2>Kontak: {{ $user->contact }}</h2>
  <h2>Alamat: {{ $user->address }}</h2>
  <h2>Media Sosial: {{ $user->social_media }}</h2>
  <a href="/dashboard/user/{{ $user->id }}/edit" class="btn btn-warning"><span data-feather="edit"></span> Edit</a>
</div>
</div>
@endsection