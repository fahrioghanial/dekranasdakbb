@extends('dashboard.layouts.main')

@section('container')
@if(session()->has('success'))
<div class="alert alert-success alert-dismissible fade show" role="alert">
  {{ session('success') }}
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
@endif

<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
  <h1 class="h2">Artikel Saya</h1>
</div>

<div class="table-responsive">
  <a href="/dashboard/articles/create" class="btn btn-primary mb-4">Buat artikel baru</a>
  <a href="/dashboard/publish-article/publishall" class="btn btn-success mb-4">Publikasikan semua artikel</a>
  <table class="table table-striped table-sm">
    <thead>
      <tr>
        <th scope="col">#</th>
        <th scope="col">Cover</th>
        <th scope="col">Judul</th>
        <th scope="col">Status Publikasi</th>
        <th scope="col">Aksi</th>
      </tr>
    </thead>
    <tbody>
      @foreach ($articles as $article)
      <tr class="align-middle">
        <td>{{ $loop->iteration }}</td>
        <td>
          <img src="{{ asset('storage/'. $article->cover)  }}" class="img-fluid" width="200"
            alt="{{ $article->title }}">
        </td>
        <td>{{ $article->title }}</td>
        <td>{{ $article->is_show ? "Terpublikasi" : "Disembunyikan" }}</td>
        <td>
          <a href="/dashboard/articles/{{ $article->id }}" class="badge bg-info"><span data-feather="eye"></span>
            Detail</a>
          <a href="/dashboard/articles/{{ $article->id }}/edit" class="badge bg-warning"><span
              data-feather="edit"></span>
            Edit</a>
          <form action="/dashboard/articles/{{ $article->id }}" method="post" class="d-inline">
            @method('delete')
            @csrf
            <button class="badge bg-danger border-0" onclick="return confirm('Hapus Artikel?')"><span
                data-feather="x-circle"></span>
              Hapus</button>
          </form>
          @if ($article->is_show)
          <a href="/dashboard/publish-article/{{ $article->id }}" class="badge bg-dark"><span
              data-feather="x-circle"></span>
            Sembunyikan</a>
          @else
          <a href="/dashboard/publish-article/{{ $article->id }}" class="badge bg-success"><span
              data-feather="check-circle"></span>
            Publikasikan</a>
          @endif
        </td>
      </tr>
      @endforeach
    </tbody>
  </table>
</div>
@endsection