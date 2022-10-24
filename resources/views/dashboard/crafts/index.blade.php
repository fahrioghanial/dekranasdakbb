@extends('dashboard.layouts.main')

@section('container')
<div class="mx-2 md:ml-80 pt-24 pb-5 md:mr-5 text-white">
  @if(session()->has('success'))
  <div class="alert alert-success mb-3">
    {{ session('success') }}
  </div>
  @endif
  <p class="text-2xl font-semibold mb-5">Kerajinan Saya</p>
  <a href="/dashboard/crafts/create" class="btn btn-info mb-4">Buat kerajinan baru</a>
  <div class="p-2 bg-white rounded-lg lg:w-fit">
    <table class="bg-yellow-500" id="kerajinan-saya">
      <!-- head -->
      <thead class="">
        <tr class="">
          <th class="bg-slate-900">#</th>
          <th class="bg-slate-900">Foto</th>
          <th class="bg-slate-900">Judul</th>
          <th class="bg-slate-900">Kategori</th>
          <th class="bg-slate-900">Harga (Rp)</th>
          <th class="bg-slate-900">Status Persetujuan</th>
          <th class="bg-slate-900">Aksi</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($crafts as $craft)
        <tr>
          <td class="bg-slate-900">{{ $loop->iteration }}</td>
          <td class="bg-slate-900">
            <img src="{{ asset('storage/'. $craft->image)  }}" class="img-fluid" width="200" alt="{{ $craft->title }}">
          </td>
          <td class="bg-slate-900">{{ $craft->title }}</td>
          <td class="bg-slate-900">{{ $craft->category->name }}</td>
          <td class="bg-slate-900">{{ $craft->price }}</td>
          <td class="bg-slate-900">{{ $craft->is_confirmed ? "Disetujui" : "Menunggu Persetujuan" }}</td>
          <td class="bg-slate-900">
            <div class="flex flex-col gap-1">
              <a href="/dashboard/crafts/{{ $craft->id }}" class="btn btn-xs btn-info btn-outline"> Detail</a>
              <a href="/dashboard/crafts/{{ $craft->id }}/edit" class="btn btn-xs btn-warning btn-outline">
                Ubah</a>
              <form action="/dashboard/crafts/{{ $craft->id }}" method="post">
                @method('delete')
                @csrf
                <button class="btn btn-xs btn-error btn-outline w-full" onclick="return confirm('Hapus Kerajinan?')">
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
    $('#kerajinan-saya').DataTable({
      language: {
            url: '//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Indonesian.json'
        },
      // responsive: true
      scrollX: true,
      // scrollY: '200px',
      // scrollCollapse: true,
      // paging: false,
    });
  } );
</script>
@endsection