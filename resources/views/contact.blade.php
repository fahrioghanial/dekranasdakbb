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
    <h1 class="font-bold md:text-4xl text-2xl mb-10">Kontak Dekranasda Kabupaten Bandung Barat</h1>
    <div class="flex flex-col md:flex-row gap-10">
      <div class="md:w-1/3">
        <div>
          <p class="text-xl md:text-2xl font-bold">Alamat</p>
          <p>Gedung Sekratariat Daerah</p>
          <p class="">Jl. Padalarang Cisarua KM. 02</p>
        </div>
        <div class="my-4">
          <p class="text-xl md:text-2xl font-bold">Telepon/Fax</p>
          <p>022-567-8910</p>
        </div>
        <div class="flex flex-col">
          <p class="text-xl md:text-2xl font-bold">Email</p>
          <p>dekranasdakbb@gmail.com</p>
          <a class="mt-1 w-1/2 rounded-lg py-2 px-3 bg-[#e00024] hover:bg-[#FF9684] text-sm text-center font-semibold text-white"
            href="mailto: dekranasdakbb@gmail.com">
            Kirim Email
          </a>
        </div>
        <div class="flex flex-col mt-4">
          <p class="text-xl md:text-2xl font-bold">Instagram</p>
          <p>@dekranasda.kbb</p>
          <a class="mt-1 w-1/2 rounded-lg py-2 px-3 bg-purple-600 hover:bg-opacity-50 text-sm text-center font-semibold text-white"
            href="https://www.instagram.com/dekranasda.kbb" target="_blank">
            <i class="bi bi-instagram"></i> Buka Instagram
          </a>
        </div>
      </div>
      <div class="container">
        <iframe class="w-full h-[500px]" id="gmap_canvas"
          src="https://maps.google.com/maps?q=5G56+HX3,%20Mekarsari,%20Ngamprah,%20West%20Bandung%20Regency,%20West%20Java%2040552&t=&z=13&ie=UTF8&iwloc=&output=embed"
          frameborder="0" scrolling="no" marginheight="0" marginwidth="0">
        </iframe>
      </div>
    </div>
</section>

@endsection