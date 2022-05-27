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
    <h1 class="font-bold md:text-4xl text-2xl mb-2">Artikel</h1>
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
      @if ($articles->count())
      @foreach ($articles as $article)
      <div class="flex flex-col px-4 py-4 bg-white shadow-md rounded-lg">
        <img src="{{ asset('storage/'. $article->cover) }}" alt="{{ $article->title }}" class="w-full mx-auto mb-4" />
        <p class="text-xl md:text-2xl font-bold mb-2">{{ $article->title }}</p>
        <p class="text-lg font-semibold">{{ $article->user->name }}</p>
        <div class="flex flex-row justify-between items-center mt-3">
          <a class="rounded-lg text-white bg-blue-600 md:text-xl py-2 px-3 hover:bg-blue-800 w-fit"
            href="/articles/{{ $article->slug }}">
            Lihat Artikel
          </a>
          <p class="text-sm">{{ $article->created_at->diffForHumans() }}</p>
        </div>
      </div>
      @endforeach
      @else
      <h1 class="font-bold md:text-4xl text-2xl mb-2">Artikel Tidak Ditemukan</h1>
      @endif
    </div>
</section>
@endsection