@extends('layouts.main')

@section('navbar')
@include('layouts.navbar')
@endsection

@section('footer')
@include('layouts.footer')
@endsection

@section('body')
<section id="home" class="mb-32">
  <div class="container m-auto pt-28">
    <div class="flex flex-col gap-10">
      <div class="w-4/5 m-auto">
        <div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel">
          <div class="carousel-indicators">
            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active"
              aria-current="true" aria-label="Slide 1"></button>
            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1"
              aria-label="Slide 2"></button>
            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2"
              aria-label="Slide 3"></button>
          </div>
          <div class="carousel-inner text-2xl rounded-lg">
            <div class="carousel-item active">
              <img src={{ asset('https://picsum.photos/id/1033/1920/1080')}} class="d-block w-100" alt="...">
            </div>
            <div class="carousel-caption d-none d-md-block font-bold">
              <h5>First slide label</h5>
              <p>Some representative placeholder content for the first slide.</p>
            </div>
            <div class="carousel-item">
              <img src={{ asset('https://picsum.photos/id/1063/1920/1080')}} class="d-block w-100" alt="...">
              <div class="carousel-caption d-none d-md-block font-bold">
                <h5>Second slide label</h5>
                <p>Some representative placeholder content for the second slide.</p>
              </div>
            </div>
            <div class="carousel-item">
              <img src={{ asset('https://picsum.photos/id/1070/1920/1080')}} class="d-block w-100" alt="...">
              <div class="carousel-caption d-none d-md-block font-bold">
                <h5>Third slide label</h5>
                <p>Some representative placeholder content for the third slide.</p>
              </div>
            </div>
          </div>
          <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions"
            data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
          </button>
          <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions"
            data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
          </button>
        </div>
      </div>

      <div class="border-b-4 border-black"></div>

      <div class=" w-full self-center ">
        <img src={{ asset('img/LogoDekranasda.jpg')}} alt=" Dekranasda" class="w-60 h-60 rounded-full m-auto" />
      </div>
      <div class="w-full self-center ">
        <h1 class="text-2xl font-bold text-center">
          DEKRANASDA KABUPATEN BANDUNG BARAT
        </h1>
      </div>
      <div class="w-full self-center text-center md:text-xl">
        <p class="">
          Adalah organisasi mitra pemerintah yang dibentuk dengan tujuan untuk memajukan industri kreatif yang memiliki
          orisinalitas di setiap daerah.
        </p>
        <p class="my-3">
          Produk yang kemudian akan menjadi ikon daerah
        </p>
        <p class="">
          Pembinaan para pelaku kreatifitas menjadi sasaran utama, sehingga mampu meningkatkan kualitas manusia dan
          produk asli Bandung Barat
        </p>
      </div>

      <div class="border-b-4 border-black my-10"></div>

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
</section>

@endsection