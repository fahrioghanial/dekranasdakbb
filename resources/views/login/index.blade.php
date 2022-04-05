@extends('layouts.main')

@section('body')
<main class="form-auth">
  <h1 class="h3 mb-3 fw-normal text-center">Masuk</h1>
  <form>
    <div class="form-floating">
      <input type="email" class="form-control" id="floatingInput" placeholder="nama@contoh.com">
      <label for="floatingInput">Alamat Email</label>
    </div>
    <div class="form-floating">
      <input type="password" class="form-control" id="floatingPassword" placeholder="Kata Sandi">
      <label for="floatingPassword">Kata Sandi</label>
    </div>

    <div class="checkbox mb-3">
      <label>
        <input type="checkbox" value="remember-me"> Ingat saya
      </label>
    </div>
    <button class="w-100 btn btn-lg btn-primary" type="submit">Masuk</button>
    <small class="d-block mt-2">Belum punya akun? daftar <a href="/register">disini</a></small>
  </form>
</main>
@endsection