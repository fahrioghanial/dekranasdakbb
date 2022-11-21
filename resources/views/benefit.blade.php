@extends('layouts.main')

@section('navbar')
@include('layouts.navbar')
@endsection

@section('footer')
@include('layouts.footer')
@endsection

@section('body')
<section id="home" class="mb-32">
  <div class="container m-auto pt-24 text-black px-3 md:px-0">
    <div class="flex flex-col md:flex-row gap-10">
      <img src={{ asset('img/benefit.jpg')}} alt="Benefit" class="md:w-1/3 w-full m-auto" />
      <div class="">
        <p class="text-2xl md:text-4xl font-bold">Keuntungan Menjadi Anggota Pengrajin</p>
        <p class="my-3">Dekranasda DKI Jakarta memberikan berbagai fasilitas kepada anggotanya agar dapat meningkatkan
          kualitas
          produk kerajinan dihasilkan. Fasilitas yang diberikan antara lain pelatihan serta pembinaan dan fasilitasi
          produksi, kemitraan hingga promosi. Tak hanya itu, Dekranasda DKI Jakarta juga mengadakan berbagai kompetisi
          yang dapat diikuti oleh anggota perajin , untuk mendorong perajin meningkatkan kreativitas dalam berkarya.</p>
        <p class="mb-5">Selain itu, Dekranasda DKI Jakarta juga memberi keuntungan lebih bagi anggota perajin yang
          bergabung
          dalam
          Koperasi Dekranasda DKI Jaya (KODE JAYA) seperti, prioritas mengikuti pelatihan dan pameran.</p>
        <a class="rounded-lg text-white bg-[#dc3545] md:text-xl py-3 px-3 hover:bg-red-800" href="/howto">
          Tata Cara Menjadi Anggota <i class="bi bi-arrow-right-circle"></i>
        </a>
      </div>

    </div>
</section>

@endsection