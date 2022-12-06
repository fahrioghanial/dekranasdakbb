@extends('layouts.main')

@section('body')

<section id="home" class="bg-[url('/img/bgaboutus.jpg')] bg-cover bg-no-repeat">
  @if(session()->has('fail'))
  <div class="alert alert-warning shadow-lg">
    <div>
      <svg xmlns="http://www.w3.org/2000/svg" class="stroke-current flex-shrink-0 h-6 w-6" fill="none"
        viewBox="0 0 24 24">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
          d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z" />
      </svg>
      <span>{{ session('fail') }}</span>
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
          Reset Kata Sandi
        </h1>
      </div>
      <div class="mx-auto md:w-1/3 bg-white p-3 rounded-md">
        <form action="/login/resetpassword" method="post">
          @csrf
          <input type="hidden" name="token" value="{{ $token }}">
          <input type="hidden" name="email" value="{{ $email }}">
          <div class="form-control w-full">
            <label class="label">
              <span class="label-text text-black">Kata Sandi Baru</span>
            </label>
            <div class="relative">
              <input type="password" name="password"
                class="input input-bordered w-full bg-white border-black border-1 text-black" id="password"
                placeholder="Kata Sandi" required>
              <span class="cursor-pointer text-2xl flex items-center absolute right-3 top-0 bottom-0 text-black z-30"
                onclick="togglePassword()"><i class="bi bi-eye-fill" id="eye"></i></span>
            </div>
            @error('password')
            <div class="text-rose-500">
              {{ $message }}
            </div>
            @enderror
          </div>
          <div class="form-control w-full">
            <label class="label">
              <span class="label-text text-black">Konfirmasi Kata Sandi Baru (tulis ulang kata sandi)</span>
            </label>
            <div class="relative">
              <input type="password" name="password_confirmation"
                class="input input-bordered w-full bg-white border-black border-1 text-black" id="password_confirmation"
                placeholder="Konfirmasi Kata Sandi" required>
              <span class="cursor-pointer text-2xl flex items-center absolute right-3 top-0 bottom-0 text-black z-30"
                onclick="togglePasswordConfirm()"><i class="bi bi-eye-fill" id="eye_confirm"></i></span>
            </div>
            @error('password_confirmation')
            <div class="text-rose-500">
              {{ $message }}
            </div>
            @enderror
          </div>
          <div class="flex flex-col gap-3 mt-5">
            <button class="bg-blue-600 py-2 px-3 hover:bg-blue-900 rounded-lg w-full text-white text-xl font-semibold"
              type="submit">Simpan Kata Sandi Baru</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</section>
<script>
  function togglePassword() {
    if (document.querySelector("#password").type == "password") {
      document.querySelector("#password").type = "text";
      document.querySelector("#eye").classList.remove("bi-eye-fill");
      document.querySelector("#eye").classList.add("bi-eye-slash-fill");
    } else {
      document.querySelector("#password").type = "password";
      document.querySelector("#eye").classList.remove("bi-eye-slash-fill");
      document.querySelector("#eye").classList.add("bi-eye-fill");
    }
  }
  function togglePasswordConfirm() {
    if (document.querySelector("#password_confirmation").type == "password") {
      document.querySelector("#password_confirmation").type = "text";
      document.querySelector("#eye_confirm").classList.remove("bi-eye-fill");
      document.querySelector("#eye_confirm").classList.add("bi-eye-slash-fill");
    } else {
      document.querySelector("#password_confirmation").type = "password";
      document.querySelector("#eye_confirm").classList.remove("bi-eye-slash-fill");
      document.querySelector("#eye_confirm").classList.add("bi-eye-fill");
    }
  }
</script>
@endsection