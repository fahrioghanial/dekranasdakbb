@extends('layouts.main')

@section('body')
<main class="form-auth mt-5">
  <h1 class="h3 mb-3 fw-normal text-center">Daftar</h1>
  <form action="/register" method="post">
    @csrf
    <div class="form-floating">
      <input type="text" name="name" class="form-control rounded-top @error('name') is-invalid @enderror" id="name"
        placeholder="Nama Lengkap" required value="{{ old('name') }}">
      <label for="name">Nama Lengkap</label>
      @error('name')
      <div class="invalid-feedback">
        {{ $message }}
      </div>
      @enderror
    </div>
    <div class="form-floating">
      <input type="text" name="username" class="form-control rounded-top @error('username') is-invalid @enderror"
        id="username" placeholder="Username (Nama Pengguna)" required value="{{ old('username') }}">
      <label for="username">Username (Nama Pengguna)</label>
      @error('username')
      <div class="invalid-feedback">
        {{ $message }}
      </div>
      @enderror
    </div>
    <div class="form-floating">
      <input type="text" name="contact" class="form-control rounded-top" id="contact" placeholder="Nomor Kontak"
        value="{{ old('contact') }}">
      <label for="contact">Nomor Kontak</label>
    </div>
    <div class="form-floating">
      <input type="text" name="address" class="form-control rounded-top" id="address" placeholder="Alamat"
        value="{{ old('address') }}">
      <label for="address">Alamat</label>
    </div>
    <div class="form-floating">
      <input type="text" name="social_media" class="form-control rounded-top" id="social_media"
        placeholder="Media Sosial" value="{{ old('social_media') }}">
      <label for="social_media">Media Sosial</label>
    </div>
    <div class="form-floating">
      <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" id="email"
        placeholder="nama@contoh.com" required value="{{ old('email') }}">
      <label for="email">Alamat Email</label>
      @error('email')
      <div class="invalid-feedback">
        {{ $message }}
      </div>
      @enderror
    </div>
    <div class="form-floating">
      <input type="password" name="password" class="form-control rounded-bottom @error('password') is-invalid @enderror"
        id="password" placeholder="Kata Sandi" required>
      <label for="password">Kata Sandi</label>
      @error('password')
      <div class="invalid-feedback">
        {{ $message }}
      </div>
      @enderror
    </div>
    <button class="w-100 btn btn-lg btn-primary" type="submit">Masuk</button>
    <small class="d-block mt-2">Sudah punya akun? masuk <a href="/login">disini</a></small>
  </form>
</main>
@endsection