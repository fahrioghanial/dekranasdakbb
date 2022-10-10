@extends('layouts.main')

@section('navbar')
@include('layouts.navbar')
@endsection

@section('footer')
@include('layouts.footer')
@endsection

@section('body')
<section id="home" class="bg-[url('/img/bgaboutus.jpg')] bg-cover bg-no-repeat text-white">
  <div class="container m-auto py-28">
    <div class="flex flex-col">
      <img src={{ asset('img/LogoDekranasda.jpg')}} alt=" Dekranasda"
        class="max-w-xs rounded-full m-auto shadow-2xl " />
      <div class="md:w-2/3 m-auto mt-7 text-center">
        <h1 class="text-3xl font-bold">DEKRANASDA KABUPATEN BANDUNG BARAT</h1>
        <div class="md:text-xl mt-5">
          <p class="">
            Adalah organisasi mitra pemerintah yang dibentuk dengan tujuan untuk memajukan industri kreatif yang
            memiliki orisinalitas di setiap daerah.
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
          <a class="rounded-lg py-2 px-3 bg-blue-600 hover:bg-[#B73E3E] text-xl font-semibold text-white"
            href="/register">
            Daftar Sekarang
          </a>
          <a class="rounded-lg py-2 px-3 bg-blue-600 hover:bg-[#B73E3E] text-xl font-semibold text-white"
            href="/crafts">
            Produk Kami
          </a>
        </div>
      </div>
    </div>
  </div>
</section>


{{-- <div class="border-b-4 border-black my-10"></div> --}}
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
        <div class="flex flex-col md:w-1/3 text-center">
          <div class="bg-white w-fit px-4 py-2 rounded-lg shadow-md text-7xl m-auto">
            <i class="bi bi-camera-fill"></i>
          </div>
          <p class="text-2xl mt-2">Dokumentasi</p>
          <p class="">Kegiatan Dekranasda Bandung Barat</p>
        </div>
        <div class="flex flex-col md:w-1/3 text-center">
          <div class="bg-white w-fit px-4 py-2 rounded-lg shadow-md text-7xl m-auto">
            <i class="bi bi-journal-text"></i>
          </div>
          <p class="text-2xl mt-2">Artikel</p>
          <p class="">Karya tulis tentang kerajinan tangan</p>
        </div>
        <div class="flex flex-col md:w-1/3 text-center">
          <div class="bg-white w-fit px-4 py-2 rounded-lg shadow-md text-7xl m-auto">
            <i class="bi bi-lightbulb"></i>
          </div>
          <p class="text-2xl mt-2">Inovasi</p>
          <p class="">Perencanaan dan Program Kreatif Dekranasda</p>
        </div>
      </div>

      <div class="w-full self-center bg-white shadow-lg p-5 rounded-lg ">
        <img src={{ asset('img/LogoDekranasda.jpg')}} alt="Dekranasda" class="w-60 h-60 rounded-full m-auto" />
        <p class="my-2">
          Doa dan Harapan menjadi tenaga kami dalam memajukan kreatifitas masyarakat Bandung Barat
        </p>
        <p class="">
          - Ketua Dekranasda KBB -
        </p>
      </div>
    </div>
  </div>
</section>

@endsection