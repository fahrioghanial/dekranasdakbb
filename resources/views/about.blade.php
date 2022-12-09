@extends('layouts.main')

@section('navbar')
@include('layouts.navbar')
@endsection

@section('footer')
@include('layouts.footer')
@endsection

@section('body')
<section id="home" class="bg-[url('/img/bgaboutus.jpg')] bg-cover bg-no-repeat">
  <div class="container m-auto pt-28 pb-10 px-3 md:px-0">
    <div class="flex flex-col text-white">
      <h1 class="font-bold md:text-4xl text-2xl text-center">Tentang Dekranasda</h1>
      <div class="flex flex-col py-10 items-center md:w-4/5 gap-7 mx-auto">
        <img src={{ asset('img/LogoDekranasda.png')}} alt="idcard" class="w-60 h-60 mx-auto rounded-full mb-4" />
        <p class="text-xl font-semibold text-center">
          Dewan Kerajinan Nasional (DEKRANAS), adalah organisasi nirlaba yang menghimpun pencinta dan peminat seni untuk
          memayungi dan mengembangkan produk kerajinan dan mengembangkan usaha tersebut, serta berupaya meningkatkan
          kehidupan pelaku bisnisnya, yang sebagian merupakan kelompok usaha kecil dan menengah (UKM).
        </p>
        <p class="text-xl font-semibold text-center">
          Untuk mendukung kelancaran kegiatannya di tingkat daerah, dengan dipayungi Surat menteri Dalam Negeri Nomor:
          537/5038/Sospol, tanggal 15 Desember 1981, dibentuklah organisasi DEKRANAS tingkat daerah (DEKRANASDA).
          Kepengurusan DEKRANASDA dikukuhkan oleh Ketua Umum DEKRANAS atas usulan daerah.
        </p>
      </div>
    </div>
  </div>
</section>
<section class="bg-[#EDDBC0]">
  <div class="text-black container m-auto pt-7 pb-7 px-3 md:px-0">
    <h1 class="font-bold md:text-4xl text-2xl mb-5 text-center">Dasar Hukum Pembentukan Dekranasda KBB</h1>
    <ul class="steps steps-vertical ">
      <li class="step step-error mb-3">
        <div class="text-left">
          <p class="md:text-lg"> Keputusan Bersama Menteri Perindustrian dan Menteri Pendidikan dan Kebudayaan No.
            85/M/SK/3/1980 dan No.
            027b/P/1980 tanggal 3 Maret 1980</p>
          <p class="font-semibold md:text-xl">Pembentukan Dewan Kerajinan Nasional</p>
        </div>
      </li>
      <li class="step step-error ">
        <div class="text-left">
          <p class="md:text-lg">Surat Menteri Dalam Negeri No. 537/5038/Sospol, tanggal 15 Desember 1981</p>
          <p class="font-semibold md:text-xl">Pembentukan Dewan Kerajinan Nasional Tingkat Daerah</p>
        </div>
      </li>
      <li class="step step-error">
        <div class="text-left">
          <p class="md:text-lg">Surat Keputusan Dekranasda Jabar No. 14.a/SK/DEKRANASDA/XII/2018</p>
          <p class="font-semibold md:text-xl">Pengesahan Pengangkatan Pengurus Dewan Kerajinan Nasional Daerah
            Kabupaten Bandung Barat Tahun 2018-2023</p>
        </div>
      </li>
    </ul>
  </div>
</section>
<section class="bg-[#e00024]">
  <div class="container m-auto pt-7 pb-7 px-3 md:px-0">
    <div class="flex flex-col text-white">
      <h1 class="font-bold md:text-4xl text-2xl text-center">Ketua Dekranasda</h1>
      <h1 class="font-bold md:text-4xl text-2xl text-center">Kabupaten Bandung Barat</h1>
      <h1 class="font-bold md:text-xl text-lg mt-2 text-center">Periode Tahun 2018 - 2023</h1>
      <div class="flex flex-col items-center mt-5 gap-7 mx-auto">
        <img src={{ asset('img/KetuaDekranasdaKBB.jpg')}} alt="Ketua Dekranasda KBB" class="w-96 h-96 rounded-full" />
        <p class="text-2xl mt-3 md:mt-0 text-center md:text-right font-bold">Sonya Fatmala Kurniawan</p>
      </div>
    </div>
</section>
<section class="bg-[url('/img/bgorganisasi.jpg')] bg-cover bg-no-repeat">
  <div class="container m-auto pt-7 pb-7 px-3 md:px-0">
    <div class="flex flex-col text-white">
      <h1 class="font-bold md:text-4xl text-2xl text-center mb-5">Pokok-Pokok Program</h1>
      <div class="text-lg">
        <p>1. Peningkatan kemampuan SDM/Perajin yang berdaya saing</p>
        <p>2. Pengembangan inovasi dan kreatifitas produk kerajinan berbasis warisan tradisi dan budaya bangsa</p>
        <p>3. Fasilitas Pembiayaan</p>
        <p>4. Penumbuhan Wirausaha Baru</p>
        <p>5. Fasilitasi kepada Perajin untuk Perlindungan HKI (Merk, Desain, Hak Cipta dan Indikasi Geografis)</p>
        <p>6. Promosi dan Publikasi DEKRANASDA</p>
        <p>7. Pengembangan dan perluasan kerjasama/pangsa pasar melalui promosi pameran baik di dalam maupun luar negeri
        </p>
        <p>8. Regenerasi SDM/Perajin dalam upaya melestarikan produk kerajinan berbasis lokal sebagai warisan budaya
          bangsa, membina dan mengembangkan produk kerajinan Indonesia yang berkualitas sebagai jati diri bangsa</p>
      </div>
    </div>
</section>
@endsection