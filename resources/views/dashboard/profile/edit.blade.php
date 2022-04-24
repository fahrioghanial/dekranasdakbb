@extends('dashboard.layouts.main')

@section('container')
@if(session()->has('fail'))
<div class="alert alert-danger alert-dismissible fade show" role="alert">
  {{ session('fail') }}
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
@endif

<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
  <h1 class="h2">Profil Saya</h1>
</div>

<div class="col-lg-8 mb-5">
  <form method="post" action="/dashboard/user/{{ $user->id }}">
    @method('put')
    @csrf
    <div class="mb-3">
      <label for="name">Nama Lengkap</label>
      <input type="text" name="name" class="form-control rounded-top @error('name') is-invalid @enderror" id="name"
        placeholder="Nama Lengkap" required value="{{ old('name', $user->name) }}">
      @error('name')
      <div class="invalid-feedback">
        {{ $message }}
      </div>
      @enderror
    </div>
    <div class="mb-3">
      <label for="username">Username (Nama Pengguna)</label>
      <input type="text" name="username" class="form-control rounded-top @error('username') is-invalid @enderror"
        id="username" placeholder="Username (Nama Pengguna)" required value="{{ old('username', $user->username) }}">
      @error('username')
      <div class="invalid-feedback">
        {{ $message }}
      </div>
      @enderror
    </div>
    <div class="mb-3">
      <label for="contact">Nomor Kontak</label>
      <input type="text" name="contact" class="form-control rounded-top" id="contact" placeholder="Nomor Kontak"
        value="{{ old('contact', $user->contact) }}">
    </div>
    <div class="mb-3">
      <label for="address">Alamat</label>
      <input type="text" name="address" class="form-control rounded-top" id="address" placeholder="Alamat"
        value="{{ old('address', $user->address) }}">
    </div>
    <div class="mb-3">
      <label for="social_media">Media Sosial</label>
      <input type="text" name="social_media" class="form-control rounded-top" id="social_media"
        placeholder="Media Sosial" value="{{ old('social_media', $user->social_media) }}">
    </div>
    <div class="mb-3">
      <label for="email">Alamat Email</label>
      <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" id="email"
        placeholder="nama@contoh.com" required value="{{ old('email', $user->email) }}">
      @error('email')
      <div class="invalid-feedback">
        {{ $message }}
      </div>
      @enderror
    </div>
    <div class="mb-3">
      <label for="old-password">Kata Sandi Lama</label>
      <input type="password" name="old_password"
        class="form-control rounded-bottom @error('password') is-invalid @enderror" id="password"
        placeholder="Kata Sandi">
    </div>
    <div class="mb-3">
      <label for="password">Kata Sandi Baru</label>
      <input type="password" name="password" class="form-control rounded-bottom @error('password') is-invalid @enderror"
        id="password" placeholder="Kata Sandi">
      @error('password')
      <div class="invalid-feedback">
        {{ $message }}
      </div>
      @enderror
    </div>
    <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
  </form>
</div>

@endsection