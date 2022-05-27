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
    @if ($article->is_show)
    <img src="{{ asset('storage/'. $article->cover)  }}" class="w-full" alt="{{ $article->title }}">
    <h1 class="font-bold md:text-3xl text-xl my-3">{{ $article->title }}</h1>
    <h1 class="font-bold md:text-xl mb-1">Oleh: {{ $article->user->name }}</h1>
    <p class="mb-3">{{ $article->created_at->diffForHumans() }}</p>
    {!! $article->content !!}
    @else
    <h1 class="font-bold md:text-4xl text-2xl mb-2">Artikel Tidak Ditemukan</h1>
    @endif
</section>
@endsection