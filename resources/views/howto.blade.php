@extends('layouts.main')

@section('navbar')
@include('layouts.navbar')
@endsection

@section('footer')
@include('layouts.footer')
@endsection

@section('body')
<section id="home" class="mb-32">
  <div class="container m-auto pt-28 text-black">
    <h1 class="font-bold md:text-4xl text-2xl mb-10">Tata Cara Menjadi Anggota Perajin</h1>
    <div class="flex flex-col lg:flex-row gap-10 ">
      <div class="flex flex-col px-4 py-10 bg-[#DC143C] shadow-md text-white rounded-lg lg:w-1/4">
        <img src={{ asset('img/idcard.jpg')}} alt="idcard" class="w-40 h-40 mx-auto rounded-full mb-4" />
        <p class="text-xl md:text-2xl font-bold mb-3">Siapkan Data Diri</p>
        <p>1. KTP</p>
        <p>2. NPWP</p>
        <p>3. SIUP/IUMK</p>
        <p>4. Foto Diri</p>
        <p>5. Foto Produk (Min. 5 Produk)</p>
      </div>
      <div class="flex flex-col px-4 py-10 bg-[#DC143C] shadow-md text-white rounded-lg lg:w-1/4">
        <img src={{ asset('img/register.jpg')}} alt="register" class="w-40 h-40 mx-auto rounded-full mb-4" />
        <p class="text-xl md:text-2xl font-bold mb-3">Pendaftaran</p>
        <p class="mb-5">Isi data diri melalui Sistem Informasi Perajin (SIP) Dekranasda Provinsi DKI Jakarta di link
          dekranasda-sip.jakarta.go.id</p>
        <a class="rounded-lg text-white bg-blue-600 md:text-xl py-3 px-3 hover:bg-blue-800 w-fit m-auto"
          href="/register">
          Daftar Sekarang <i class="bi bi-arrow-right-circle"></i>
        </a>
      </div>
      <div class="flex flex-col px-4 py-10 bg-[#DC143C] shadow-md text-white rounded-lg lg:w-1/4">
        <img src={{ asset('img/checklist.jpg')}} alt="checklist" class="w-40 h-40 mx-auto rounded-full mb-4" />
        <p class="text-xl md:text-2xl font-bold mb-3">Kurasi Produk</p>
        <p>Dekranasda Wilayah Kota Administrasi terkait akan menghubungi untuk melakukan kurasi produk</p>
      </div>
      <div class="flex flex-col px-4 py-10 bg-[#DC143C] shadow-md text-white rounded-lg lg:w-1/4">
        <img src={{ asset('img/notif.jpg')}} alt="notif" class="w-40 h-40 mx-auto rounded-full mb-4" />
        <p class="text-xl md:text-2xl font-bold mb-3">Update Info Terkini</p>
        <p>Terus update info terkini melalui akun SIP</p>
      </div>
    </div>
</section>

@endsection