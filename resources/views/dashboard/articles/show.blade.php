@extends('dashboard.layouts.main')

@section('container')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
  <h1 class="h2">Artikel Saya</h1>
</div>

<div class="p-5 bg-light">
  <img src="{{ asset('storage/'. $article->cover)  }}" class="img-fluid mt-3" alt="{{ $article->title }}">
  <h1>{{ $article->title }}</h1>
  <p>{!! $article->content !!}</p>
  <a href="/dashboard/articles/" class="btn btn-success"><span data-feather="arrow-left"></span> Kembali</a>
  <a href="/dashboard/articles/{{ $article->id }}/edit" class="btn btn-warning"><span data-feather="edit"></span>
    Edit</a>
  <form action="/dashboard/articles/{{ $article->id }}" method="post" class="d-inline">
    @method('delete')
    @csrf
    <button class="btn btn-danger" onclick="return confirm('Hapus Kerajinan?')"><span data-feather="x-circle"></span>
      Hapus</button>
  </form>
  @if ($article->is_show)
  <a href="/dashboard/publish-article/{{ $article->id }}" class="btn btn-dark"><span data-feather="x-circle"></span>
    Sembunyikan</a>
  @else
  <a href="/dashboard/publish-article/{{ $article->id }}" class="btn btn-success"><span
      data-feather="check-circle"></span>
    Publikasikan</a>
  @endif
</div>
</div>
@endsection