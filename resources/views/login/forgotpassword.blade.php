@extends('layouts.main')

@section('body')

<section id="home" class="bg-[url('/img/bgaboutus.jpg')] bg-cover bg-no-repeat">
  @if(session()->has('success'))
  <div class="alert alert-success shadow-lg">
    <div>
      <svg xmlns="http://www.w3.org/2000/svg" class="stroke-current flex-shrink-0 h-6 w-6" fill="none"
        viewBox="0 0 24 24">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
          d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
      </svg>
      <span>{{ session('success') }}</span>
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
          Lupa Kata Sandi
        </h1>
      </div>
      <div class="mx-auto md:w-1/3 bg-white p-3 rounded-md">
        <form action="/login/forgotpassword" method="post">
          @csrf
          <div class="form-control w-full">
            <label class="label">
              <span class="label-text text-black">Masukkan Email yang Terdaftar</span>
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
          {{-- <div class="form-control w-full">
            <label class="label">
              <span class="label-text text-black">Kata Sandi</span>
            </label>
            <div class="relative">
              <input type="password" name="password"
                class="input input-bordered w-full bg-white border-black border-1 text-black" id="password"
                placeholder="Kata Sandi" required>
              <span class="cursor-pointer text-2xl flex items-center absolute right-3 top-0 bottom-0 text-black z-30"
                onclick="togglePassword()"><i class="bi bi-eye-fill" id="eye"></i></span>
            </div>
          </div>
          <a class="mt-2 text-sm hover:text-red-600 text-blue-700 block" href="/login/forgotpassword">Lupa Kata
            Sandi?</a> --}}
          <div class="flex flex-col gap-3 mt-5">
            <button class="bg-blue-600 py-2 px-3 hover:bg-blue-900 rounded-lg w-full text-white text-xl font-semibold"
              type="submit">Reset Kata Sandi</button>
            <a class="rounded-lg py-2 px-3 bg-red-600 hover:bg-red-900 text-white text-xl font-semibold text-center"
              href="/">
              Batal
            </a>
          </div>
          <small class="mt-2 text-black text-md">Belum punya akun? daftar <a class="hover:text-red-600 text-blue-700"
              href="/register">disini</a></small>
        </form>
      </div>
    </div>
  </div>
</section>
@endsection