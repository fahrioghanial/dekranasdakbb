@extends('layouts.main')

@section('body')
<main class="form-auth mt-5">
  <h1 class="h3 mb-3 fw-normal text-center">Daftar</h1>
  <form>
    <div class="form-floating">
      <input type="text" name="name" class="form-control rounded-top" id="name" placeholder="Nama Lengkap">
      <label for="name">Nama Lengkap</label>
    </div>
    <div class="form-floating">
      <input type="email" name="email" class="form-control" id="email" placeholder="nama@contoh.com">
      <label for="email">Alamat Email</label>
    </div>
    <div class="form-floating">
      <input type="password" name="password" class="form-control rounded-bottom" id="password" placeholder="Kata Sandi">
      <label for="password">Kata Sandi</label>
    </div>
    <button class="w-100 btn btn-lg btn-primary" type="submit">Masuk</button>
    <small class="d-block mt-2">Sudah punya akun? masuk <a href="/login">disini</a></small>
  </form>
</main>
@endsection