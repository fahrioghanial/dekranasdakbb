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

<section id="home" class="bg-[url('/img/bgaboutus.jpg')] bg-cover bg-no-repeat">
  <div class="container m-auto py-24 ">
    <div class="flex flex-col gap-10">
      <div class="w-full self-center">
        <img src={{ asset('img/LogoDekranasda.jpg')}} alt="logodekranasda" class="w-60 h-60 rounded-full m-auto" />
      </div>
      <div class="w-full self-center ">
        <h1 class="text-2xl font-bold text-center text-white">
          DEKRANASDA KABUPATEN BANDUNG BARAT
        </h1>
        <h1 class="text-2xl font-bold text-center text-white mt-4">
          MASUK
        </h1>
      </div>
      <div class="mx-auto md:w-1/3">
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
          <button class="bg-blue-600 py-2 px-3 hover:bg-blue-900 rounded-lg w-full text-white"
            type="submit">Masuk</button>
          <small class="d-block mt-2 text-white text-md">Belum punya akun? daftar <a href="/register">disini</a></small>
        </form>
      </div>
    </div>
  </div>
</section>
@endsection