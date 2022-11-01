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
      <h1 class="font-bold md:text-4xl text-2xl">Tentang Dekranasda</h1>
      <div class="flex flex-col py-10">
        <img src={{ asset('img/LogoDekranasda.png')}} alt="idcard" class="w-60 h-60 mx-auto rounded-full mb-4" />
        <p class=>Bangsa Indonesia di karuniai Tuhan Yang Maha Esa dengan beragam macam aneka kekayaan
          khasanah budaya dan
          limpahan kekayaan alam yang dapat diolah untuk mengungkapkan nilai budaya dalam bentuk barang kerajinan.</p>
        <p class="my-4">Penduduk Indonesia sebagian besar hidup di daerah pedesaan, menempati ribuan pulau Nusantara dan
          sudah
          mengenal adanya usaha kerajinan untuk mendukung kehidupan mereka seperti membuat keris, kapak, tombak, panah,
          kain tenun, batik, anyaman dan berbagai kerajinan khas masing-masing suku bangsa.
        </p>
        <p>Pada sisi lain, keberadaan para pengrajin dari waktu ke waktu tidak mengalami perubahan, baik dalam hal
          keterampilan, pengetahuan maupun tingkat kesejahteraannya. Dengan semakin pentingnya keberadaan industri
          kerajinan sebagai sarana pencarian pendapatan, tokoh masyarakat seni budaya dan kerajinan harus menggugah
          untuk mengembangkan bidang kerajinan yang bersifat nasional selagi mewujudkan organisasi yang diberi nama
          Dewan Kerajinan Nasional.</p>
      </div>
      <h1 class="font-bold md:text-4xl text-2xl mt-5">Visi & Misi Dekranasda</h1>
      <div class="flex flex-col md:flex-row py-10">
        <div class="flex flex-col md:w-1/2 mb-5">
          <p class="text-xl">Visi</p>
          <p>Mendukung Kemandirian Ekonomi Indonesia</p>
        </div>
        <div class="flex flex-col md:w-1/2">
          <p class="text-xl">Misi</p>
          <p>Dekranasda Provinsi DKI Jakarta sebagai wadah ekonomi kerakyatan yang memfasilitasi pengembangan kerajinan
            unggulan Provinsi DKI Jakarta sehigga dapat diterima dan dipasarkan dengan luas secara lokal dan
            internasional</p>
        </div>
      </div>
    </div>
</section>
<section class="bg-[#B73E3E]">
  <div class="container m-auto pt-10 pb-10 px-3 md:px-0">
    <div class="flex flex-col text-white">
      <h1 class="font-bold md:text-4xl text-2xl">Ketua Dekranasda</h1>
      <h1 class="font-bold md:text-4xl text-2xl">Kabupaten Bandung Barat</h1>
      <h1 class="font-bold md:text-xl text-lg mt-2">Periode Oktober 2018 - 2022</h1>
      <div class="flex flex-col md:flex-row py-10">
        <img src={{ asset('img/LogoDekranasda.png')}} alt="parentalogi"
          class="w-60 h-60 rounded-full mx-auto md:w-1/5" />
        <div class="flex flex-col md:ml-10 md:w-4/5">
          <p class="text-xl">Nama</p>
          <p>lorem ipsum</p>
        </div>
      </div>
    </div>
</section>
<section class="bg-[url('/img/bgorganisasi.jpg')] bg-cover bg-no-repeat">
  <div class="container m-auto pt-10 pb-10 px-3 md:px-0">
    <div class="flex flex-col text-white">
      <h1 class="font-bold md:text-4xl text-2xl">Organisasi</h1>
      <h1 class="font-bold md:text-4xl text-2xl">Dekranasda KBB</h1>
      <p class="my-4">Dewan Kerajinan Nasional Daerah (Dekranasda)Provinsi DKI Jakarta adalah organisasi wadah para
        pengrajin yang
        berdomisili di DKI Jakarta Di pimpin oleh Istri Gubernur /Kepala Daerah, Kegiatan operasioanal di bantu oleh
        seorang wakil ketua, ketua harian, wakil ketua harian, sekretaris dan bendahara.</p>
      <div>
        <p>Dekranasda Provinsi DKI Jakarta mempunyai bidang:</p>
        <p>1. Bidang pemasaran dan daya saing produk</p>
        <p>2. Bidang Manajemen Usaha & Pendanaan</p>
        <p>3. Bidang Kreatif</p>
        <p>4. Bidang Manajemen Data dan E-Commerce</p>
        <p>5. Koordinator Wilayah</p>
        <p>6. Tim Renstra</p>
        <p>7. Sekretariat</p>
      </div>
    </div>
</section>
@endsection