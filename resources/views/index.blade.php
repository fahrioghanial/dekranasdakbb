@extends('layouts.main')

@section('navbar')
@include('layouts.navbar')
@endsection

@section('footer')
@include('layouts.footer')
@endsection

@section('body')

<section id="home" class="bg-[url('/img/bgaboutus.jpg')] bg-cover bg-no-repeat text-white">
  <div class="container m-auto py-28 px-3 md:px-0">
    <div class="flex flex-col">
      <img src={{ asset('img/LogoDekranasda.png')}} alt=" Dekranasda"
        class="max-w-xs rounded-full m-auto shadow-2xl " />
      <div class="md:w-2/3 m-auto mt-7 text-center">
        <h1 class="md:text-3xl text-xl font-bold">DEWAN KERAJINAN NASIONAL DAERAH KABUPATEN BANDUNG BARAT (DEKRANASDA
          KBB)</h1>
        <div class="md:text-xl mt-5">
          <p class="">
            Dekranasda KBB adalah organisasi mitra pemerintah yang dibentuk dengan tujuan
            untuk
            memajukan industri kreatif yang
            memiliki orisinalitas di daerah Bandung Barat.
          </p>
          <p class="my-3">
            Produk yang kemudian akan menjadi ikon daerah
          </p>
          <p class="">
            Pembinaan para pelaku kreatifitas menjadi sasaran utama, sehingga mampu meningkatkan kualitas manusia
            dan produk asli Bandung Barat
          </p>
        </div>
        <div class="flex gap-5 mt-5 justify-center">
          @auth
          <a class="rounded-lg py-2 px-3 bg-blue-600 hover:bg-[#B73E3E] text-xl font-semibold text-white"
            href="/crafts">
            Produk Kami
          </a>
          @else
          <a class="rounded-lg py-2 px-3 bg-blue-600 hover:bg-[#B73E3E] text-xl font-semibold text-white"
            href="/register">
            Daftar Sekarang
          </a>
          <a class="rounded-lg py-2 px-3 bg-blue-600 hover:bg-[#B73E3E] text-xl font-semibold text-white"
            href="/crafts">
            Produk Kami
          </a>
          @endauth
        </div>
      </div>
    </div>
  </div>
</section>
<section id="home2" class="pb-32 text-black">
  <div class="container m-auto mt-10">
    <div class="flex flex-col gap-10">
      <div class="w-full self-center text-center">
        <h1 class="text-2xl font-bold text-center">
          BAKTI KINERJA
        </h1>
        <p class="md:text-xl mt-3 px-10">
          Sampurasun Wargi Bandung Barat, Wilujeng Sumping dina Salayang Pandang DEKRANASDA KBB, Salawasna Ngawangun
          Bandung Barat nu Langkung Kreatip, Hayu Bangkit Maju tur Ngajuang Babarengan.
        </p>
      </div>
      <div class="flex flex-col md:flex-row m-auto gap-14 md:items-start">
        <a class="flex flex-col md:w-1/3 text-center" href="/about">
          <div class="bg-white w-fit px-4 py-2 rounded-lg shadow-md text-7xl m-auto hover:bg-[#DD5353]">
            <i class="bi bi-info-circle-fill"></i>
          </div>
          <p class="text-2xl mt-2">Tentang Kami</p>
          <p class="">Profil Dekranasda Bandung Barat</p>
        </a>
        <a class="flex flex-col md:w-1/3 text-center" href="/member">
          <div class="bg-white w-fit px-4 py-2 rounded-lg shadow-md text-7xl m-auto hover:bg-[#DD5353]">
            <i class="bi bi-people-fill"></i>
          </div>
          <p class="text-2xl mt-2">Anggota Perajin</p>
          <p class="">Anggota Perajin Dekranasda Bandung Barat</p>
        </a>
        <a class="flex flex-col md:w-1/3 text-center" href="/articles">
          <div class="bg-white w-fit px-4 py-2 rounded-lg shadow-md text-7xl m-auto hover:bg-[#DD5353]">
            <i class="bi bi-journal-text"></i>
          </div>
          <p class="text-2xl mt-2">Artikel</p>
          <p class="">Karya tulis tentang kerajinan tangan</p>
        </a>
      </div>

      <div class="w-3/4 self-center bg-white shadow-lg p-2 rounded-lg flex md:flex-row flex-col gap-2">
        <img src={{ asset('img/KetuaDekranasdaKBB.jpg')}} alt="Ketua Dekranasda KBB" class="w-96 rounded-full m-auto" />
        <div class="md:text-xl font-semibold m-auto">
          <p class="my-2">
            "Doa dan Harapan menjadi tenaga kami dalam memajukan kreatifitas masyarakat Bandung Barat"
          </p>
          <p class="">
            - Sonya Fatmala (Ketua Dekranasda KBB) -
          </p>
        </div>
      </div>
    </div>
  </div>
</section>
@if ($web_viewer_count)
<div class="flex gap-3 bg-white p-1 justify-center items-center text-lg font-semibold text-black">
  <i class="bi bi-eye text-lg"></i>
  <p>{{ $web_viewer_count->count }} Pengunjung</p>
</div>
@endif

@endsection