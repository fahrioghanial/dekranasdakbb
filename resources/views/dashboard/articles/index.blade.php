@extends('dashboard.layouts.main')

@section('container')

<div class="mx-2 md:ml-80 pt-24 pb-5 md:mr-5 text-white">
  @if(session()->has('success'))
  <div class="alert alert-success mb-3">
    {{ session('success') }}
  </div>
  @endif
  <p class="text-2xl font-semibold mb-5">Artikel Saya</p>
  <a href="/dashboard/articles/create" class="btn btn-info mb-4 font-semibold">Buat artikel baru</a>
  <a href="/dashboard/publish-article/publishall" class="btn btn-success mb-4 font-semibold">Publikasikan semua
    artikel</a>
  <div class="p-2 bg-white rounded-lg lg:w-fit">
    <table class="" id="artikel">
      <!-- head -->
      <thead class="">
        <tr>
          <th class="bg-slate-900">#</th>
          <th class="bg-slate-900">Cover</th>
          <th class="bg-slate-900">Judul</th>
          <th class="bg-slate-900">Status Publikasi</th>
          <th class="bg-slate-900">Aksi</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($articles as $article)
        <tr>
          <td class="bg-slate-900">{{ $loop->iteration }}</td>
          <td class="bg-slate-900">
            <img src="{{ asset('storage/'. $article->cover)  }}" class="img-fluid" width="200"
              alt="{{ $article->title }}">
          </td>
          <td class="bg-slate-900">{{ $article->title }}</td>
          <td class="bg-slate-900">{{ $article->is_show ? "Terpublikasi" : "Disembunyikan" }}</td>
          <td class="bg-slate-900">
            <div class="flex flex-col gap-1">
              <a href="/dashboard/articles/{{ $article->id }}" class="btn btn-xs btn-info btn-outline">
                Detail</a>
              <a href="/dashboard/articles/{{ $article->id }}/edit" class="btn btn-xs btn-warning btn-outline">
                Ubah</a>
              <form action="/dashboard/articles/{{ $article->id }}" method="post">
                @method('delete')
                @csrf
                <button class="btn btn-xs btn-error btn-outline w-full" onclick="return confirm('Hapus Artikel?')">
                  Hapus</button>
              </form>
              @if ($article->is_show)
              <a href="/dashboard/publish-article/{{ $article->id }}" class="btn btn-xs btn-secondary btn-outline">
                Sembunyikan</a>
              @else
              <a href="/dashboard/publish-article/{{ $article->id }}" class="btn btn-xs btn-success btn-outline">
                Publikasikan</a>
              @endif
            </div>
          </td>
        </tr>
        @endforeach
      </tbody>
    </table>
  </div>
</div>

<script>
  $(document).ready( function () {
    $('#artikel').DataTable({
      language: {
            url: '//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Indonesian.json'
        },
      scrollX: true,
      // scrollY: '200px',
      // scrollCollapse: true,
      // paging: false,
    });
  } );
</script>
@endsection