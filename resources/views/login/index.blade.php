@extends('layouts.main')

@section('body')
@if(session()->has('success'))
<div class="alert alert-success alert-dismissible fade show" role="alert">
  {{ session('success') }}
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
@endif

@if(session()->has('loginError'))
<div class="alert alert-danger alert-dismissible fade show" role="alert">
  {{ session('loginError') }}
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
@endif

<main class="form-auth">
  <h1 class="h3 mb-3 fw-normal text-center">Masuk</h1>
  <form action="/login" method="post">
    @csrf
    <div class="form-floating">
      <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" id="email"
        placeholder="nama@contoh.com" autofocus required value="{{ old('email') }}">
      <label for="email">Alamat Email</label>
      @error('email')
      <div class="invalid-feedback">
        {{ $message }}
      </div>
      @enderror
    </div>
    <div class="form-floating">
      <input type="password" name="password" class="form-control" id="password" placeholder="Kata Sandi" required>
      <label for="password">Kata Sandi</label>
    </div>
    <button class="w-100 btn btn-lg btn-primary" type="submit">Masuk</button>
    <small class="d-block mt-2">Belum punya akun? daftar <a href="/register">disini</a></small>
  </form>
</main>
@endsection