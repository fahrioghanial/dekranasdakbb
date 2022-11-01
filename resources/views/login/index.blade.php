@extends('layouts.main')

@section('body')

<section id="home" class="bg-[url('/img/bgaboutus.jpg')] bg-cover bg-no-repeat">
  @if(session()->has('loginError'))
  <div class="alert alert-warning shadow-lg">
    <div>
      <svg xmlns="http://www.w3.org/2000/svg" class="stroke-current flex-shrink-0 h-6 w-6" fill="none"
        viewBox="0 0 24 24">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
          d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z" />
      </svg>
      <span>{{ session('loginError') }}</span>
    </div>
  </div>
  @endif
  <div class="container m-auto py-24 ">
    <div class="flex flex-col gap-10">
      <div class="w-full self-center">
        <img src={{ asset('img/LogoDekranasda.png')}} alt="logodekranasda" class="w-60 h-60 rounded-full m-auto" />
      </div>
      <div class="w-full self-center ">
        <h1 class="text-2xl font-bold text-center text-white">
          DEKRANASDA KABUPATEN BANDUNG BARAT
        </h1>
        <h1 class="text-2xl font-bold text-center text-white mt-4">
          MASUK
        </h1>
      </div>
      <div class="mx-auto md:w-1/3 bg-white p-3 rounded-md">
        <form action="/login" method="post">
          @csrf
          <div class="form-control w-full">
            <label class="label">
              <span class="label-text text-black">Alamat Email</span>
            </label>
            <input type="email" name="email"
              class="input input-bordered w-full {{ $errors->has('email')?'border-rose-500':'border-black' }} border-1 bg-white text-black"
              id="email" placeholder="nama@contoh.com" autofocus value="{{ old('email') }}">
            @error('email')
            <div class="text-rose-500">
              {{ $message }}
            </div>
            @enderror
          </div>
          <div class="form-control w-full">
            <label class="label">
              <span class="label-text text-black">Kata Sandi</span>
            </label>
            <input type="password" name="password"
              class="input input-bordered w-full bg-white border-black border-1 text-black" id="password"
              placeholder="Kata Sandi" required>
          </div>
          <div class="flex flex-col gap-3 mt-5">
            <button class="bg-blue-600 py-2 px-3 hover:bg-blue-900 rounded-lg w-full text-white text-xl font-semibold"
              type="submit">Masuk</button>
            <a class="rounded-lg py-2 px-3 bg-red-600 hover:bg-red-900 text-white text-xl font-semibold text-center"
              href="/">
              Batal
            </a>
          </div>
          <small class="mt-2 text-black text-md">Belum punya akun? daftar <a class="hover:text-red-600"
              href="/register">disini</a></small>
        </form>
      </div>
    </div>
  </div>
</section>
@endsection