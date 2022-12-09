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
    <h1 class="font-bold md:text-4xl text-2xl mb-2">Artikel</h1>
    <h1 class="font-bold md:text-3xl text-xl mb-5">{{ $title }}</h1>
    <form action="/articles" class="mb-3">
      <div class="flex w-1/2">
        <input type="text" name="search"
          class="input input-bordered rounded-r-none border-r-none bg-white md:w-4/5 text-black" id="search"
          placeholder="Cari Artikel..." value="{{ request('search') }}">
        <button
          class="bg-blue-600 py-2 px-3 hover:bg-blue-900 rounded-l-none border-l-none rounded-lg text-white text-xl font-semibold"
          type="submit">Cari</button>
      </div>
    </form>
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 items-stretch">
      @if ($articles->count())
      @foreach ($articles as $article)
      <div class="card w-full bg-white shadow-xl">
        <img class="object-cover object-center h-[330px] w-full" src="{{ asset('storage/'. $article->cover) }}"
          alt="{{ $article->title }}" />
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
    {{ $articles->links() }}
  </div>
</section>
@endsection