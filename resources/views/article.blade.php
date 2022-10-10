@extends('layouts.main')

@section('navbar')
@include('layouts.navbar')
@endsection

@section('footer')
@include('layouts.footer')
@endsection

@section('body')
<section id="home" class="mb-32">
  <div class="container m-auto mt-28 text-black">
    <div class="bg-white rounded-lg p-10 mb-7">
      @if ($article->is_show)
      <img src="{{ asset('storage/'. $article->cover)  }}" class="w-3/4 m-auto" alt="{{ $article->title }}">
      <h1 class="font-bold md:text-3xl text-xl mb-3 mt-5">{{ $article->title }}</h1>
      <h1 class="font-bold md:text-xl mb-1">Oleh: {{ $article->user->name }}</h1>
      <p class="mb-3">{{ $article->created_at->diffForHumans() }}</p>
      {!! $article->content !!}
      @else
      <h1 class="font-bold md:text-4xl text-2xl mb-2">Artikel Tidak Ditemukan</h1>
      @endif
    </div>
    <a class="rounded-lg text-white bg-blue-600 md:text-xl py-2 px-3 hover:bg-blue-800 w-fit" href="/articles">Kembali
    </a>
  </div>
</section>
@endsection