@extends('dashboard.layouts.main')

@section('container')

<div class="mx-2 md:ml-80 pt-24 h-screen pb-5 md:mr-5 text-white">
  @if(session()->has('success'))
  <div class="alert alert-success mb-3">
    {{ session('success') }}
  </div>
  @endif
  <p class="text-2xl font-semibold mb-5">Kategori Produk</p>
  <a href="/dashboard/categories/create" class="btn btn-info mb-4">Tambah Kategori baru</a>
  <div class="p-2 bg-white rounded-lg w-fit">
    <table class="" id="kategori">
      <!-- head -->
      <thead class="">
        <tr class="">
          <th class="bg-slate-900">#</th>
          <th class="bg-slate-900">Nama Kategori</th>
          <th class="bg-slate-900">Jumlah Produk</th>
          <th class="bg-slate-900">Aksi</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($categories as $category)
        <tr>
          <td class="bg-slate-900">{{ $loop->iteration }}</td>
          <td class="bg-slate-900">{{ $category->name }}</td>
          <td class="bg-slate-900">{{ $category->crafts_count }}</td>
          <td class="bg-slate-900">
            <div class="flex flex-col gap-1">
              <a href="/dashboard/categories/{{ $category->id }}/edit" class="btn btn-xs btn-warning btn-outline">
                Ubah</a>
              <form action="/dashboard/categories/{{ $category->id }}" method="post" class="w-full">
                @method('delete')
                @csrf
                <button class="btn btn-xs btn-error btn-outline w-full" onclick="return confirm('Hapus Kategori?')">
                  Hapus</button>
              </form>
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
    $('#kategori').DataTable({
      language: {
            url: '//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Indonesian.json'
        },
      // scrollX: true,
      // scrollY: '200px',
      // scrollCollapse: true,
      // paging: false,
    });
  } );
</script>
@endsection