@extends('layouts.main')

@section('navbar')
@include('layouts.navbar')
@endsection

@section('footer')
@include('layouts.footer')
@endsection

@section('body')
<section id="home" class="mb-32">
  <div class="container m-auto pt-28 text-black px-3 md:px-0">
    <div class="flex flex-col gap-10">
      <div>
        <h1 class="md:text-4xl text-2xl font-bold">Struktur Organisasi</h1>
        <h1 class="md:text-4xl text-2xl font-bold">Dekranasda Kabupaten Bandung Barat</h1>
      </div>
      <img src={{ asset('img/strukturorganisasi.jpg')}} alt="Benefit" class="w-full m-auto" />
    </div>

</section>

@endsection