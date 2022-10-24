@extends('dashboard.layouts.main')

@section('container')

<div class="mx-2 md:ml-80 pt-24 pb-5 md:mr-5 text-white">
  <p class="text-2xl font-semibold mb-5">Artikel Saya</p>
  <div class="bg-white rounded-lg p-5 text-black">
    <img src="{{ asset('storage/'. $article->cover)  }}" class="w-1/2 m-auto" alt="{{ $article->title }}">
    <h1 class="text-xl font-semibold my-3">{{ $article->title }}</h1>
    <p>{!! $article->content !!}</p>
    <div class="flex md:flex-row flex-col gap-1 mt-3">
      <a href="/dashboard/articles/" class="btn btn-info">Kembali</a>
      <a href="/dashboard/articles/{{ $article->id }}/edit" class="btn btn-warning">
        Ubah</a>
      <form action="/dashboard/articles/{{ $article->id }}" method="post">
        @method('delete')
        @csrf
        <button class="btn btn-error" onclick="return confirm('Hapus Kerajinan?')">
          Hapus</button>
      </form>
      @if ($article->is_show)
      <a href="/dashboard/publish-article/{{ $article->id }}" class="btn btn-secondary">
        Sembunyikan</a>
      @else
      <a href="/dashboard/publish-article/{{ $article->id }}" class="btn btn-success">
        Publikasikan</a>
      @endif
    </div>
  </div>
</div>
@endsection