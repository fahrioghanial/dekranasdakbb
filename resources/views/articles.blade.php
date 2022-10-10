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
    <h1 class="font-bold md:text-4xl text-2xl mb-10">Artikel</h1>
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 items-start">
      @if ($articles->count())
      @foreach ($articles as $article)
      <div class="card w-full bg-white shadow-xl">
        <figure><img src="{{ asset('storage/'. $article->cover) }}" alt="{{ $article->title }}" /></figure>
        <div class="card-body">
          <h2 class="card-title">
            {{ $article->title }}
          </h2>
          <p class="text-md font-semibold">Oleh: {{ $article->user->name }}</p>
          <div class="card-actions justify-between items-center mt-3">
            <a class="rounded-lg text-white bg-blue-600 md:text-xl py-2 px-3 hover:bg-blue-800 w-fit"
              href="/articles/{{ $article->slug }}">
              Lihat
            </a>
            <div class="badge badge-outline">{{ $article->created_at->diffForHumans() }}</div>
          </div>
        </div>
      </div>
      @endforeach
      @else
      <h1 class="font-bold md:text-4xl text-2xl mb-2">Artikel Tidak Ditemukan</h1>
      @endif
    </div>
</section>
@endsection