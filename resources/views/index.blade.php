@extends('layouts.main')

@section('body')
<section id="home" class="bg-[url('/img/bgaboutus.jpg')] bg-cover bg-no-repeat">
  <div class="container m-auto py-24 text-white">
    <div class="flex flex-col gap-10">
      <div class="w-full self-center ">
        <img src={{ asset('img/LogoDekranasda.jpg')}} alt="logodekranasda" class="w-60 h-60 rounded-full m-auto" />
      </div>
      <div class="w-full self-center ">
        <h1 class="text-2xl font-bold text-center">
          DEKRANASDA KABUPATEN BANDUNG BARAT
        </h1>
      </div>
      <div class="w-full flex">
        <div class="flex m-auto md:gap-24 gap-12">
          <div class="flex flex-col">
            <a class="rounded-lg text-white bg-[#dc3545] md:text-7xl text-4xl py-3 px-3 hover:bg-red-800"
              href="/register">
              <i class="bi bi-box-arrow-in-right"></i>
            </a>
            <p class="text-center md:text-xl text-lg">Daftar</p>
          </div>
          <div class="flex flex-col">
            <a class="rounded-lg text-white bg-[#dc3545] md:text-7xl text-4xl py-3 px-3 hover:bg-red-800" href="/info">
              <i class="bi bi-info-circle"></i>
            </a>
            <p class="text-center md:text-xl text-lg">Informasi</p>
          </div>
          <div class="flex flex-col">
            <a class="rounded-lg text-white bg-[#dc3545] md:text-7xl text-4xl py-3 px-3 hover:bg-red-800" href="/login">
              <i class="bi bi-check-circle"></i>
            </a>
            <p class="text-center md:text-xl text-lg">Masuk</p>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

@endsection