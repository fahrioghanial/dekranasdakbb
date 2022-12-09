@extends('layouts.main')

@section('navbar')
@include('layouts.navbar')
@endsection

@section('footer')
@include('layouts.footer')
@endsection

@section('body')
<section id="home" class="mb-32">
  <div class="container m-auto mt-28 text-black px-3 md:px-0">
    <a class="rounded-lg text-white bg-[#e00024] md:text-xl py-2 px-3 hover:bg-[#FF9684] w-fit" href="/articles">
      <i class="bi bi-arrow-bar-left"></i> Kembali
    </a>
    <div class="bg-white rounded-lg p-10 my-7">
      @if ($article->is_show)
      <img class="object-contain object-center h-[700px] w-full mx-auto" src="{{ asset('storage/'. $article->cover)  }}"
        alt="{{ $article->title }}" />
      <h1 class="font-bold md:text-3xl text-xl mb-3 mt-5">{{ $article->title }}</h1>
      <h1 class="font-bold md:text-xl mb-1">Oleh: {{ $article->user->name }}</h1>
      <p class="mb-3">{{ $article->created_at->diffForHumans() }}</p>
      {!! $article->content !!}
      @else
      <h1 class="font-bold md:text-4xl text-2xl mb-2">Artikel Tidak Ditemukan</h1>
      @endif
    </div>
  </div>
</section>
@endsection