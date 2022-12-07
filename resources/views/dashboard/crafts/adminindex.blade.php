@extends('dashboard.layouts.main')

@section('container')

<div class="mx-2 md:ml-80 pt-24 pb-5 md:mr-5 text-white">
  @if(session()->has('success'))
  <div class="alert alert-success mb-3">
    {{ session('success') }}
  </div>
  @endif
  <p class="text-2xl font-semibold mb-5">Admin Produk Kerajinan</p>
  <div class="mb-4 flex flex-col md:flex-row gap-3">
    <a href="/dashboard/craftsadmin/confirmallcrafts" class="btn bg-green-600 text-white border-0">Setujui Semua
      Produk</a>
    <a href="/dashboard/craftsadmin/export" class="btn bg-white text-black hover:text-white border-0">Unduh Data
      Produk</a>
  </div>
  <div class="p-2 bg-white rounded-lg">
    <table class="" id="konfirmasi-kerajinan">
      <!-- head -->
      <thead class="">
        <tr class="">
          <th class="bg-slate-900">#</th>
          <th class="bg-slate-900">Foto Kerajinan</th>
          <th class="bg-slate-900">Judul</th>
          <th class="bg-slate-900">Pembuat</th>
          <th class="bg-slate-900">Nama Usaha</th>
          <th class="bg-slate-900">Harga (Rp)</th>
          <th class="bg-slate-900">Kategori</th>
          <th class="bg-slate-900">Pengunjung</th>
          <th class="bg-slate-900">Tanggal Ditambahkan</th>
          <th class="bg-slate-900">Terakhir Diubah Oleh</th>
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
          <td class="bg-slate-900">{{ $craft->craftsman->name }}</td>
          <td class="bg-slate-900">{{ $craft->craftsman->business_name }}</td>
          <td class="bg-slate-900">{{ $craft->price }}</td>
          <td class="bg-slate-900">{{ $craft->category->name }}</td>
          <td class="bg-slate-900">{{ $craft->views }}</td>
          <td class="bg-slate-900">{{ $craft->created_at->format('d-m-Y') }}</td>
          <td class="bg-slate-900 whitespace-nowrap">
            @if (isset($craft->updatedBy->name))
            {{ $craft->updatedBy->name }}, pada {{ $craft->updated_at->format('d-m-Y')}}
            @else
            -
            @endif
          </td>
          <td class="bg-slate-900">{{ $craft->is_confirmed ? "Disetujui" : "Menunggu Persetujuan" }}</td>
          <td class="bg-slate-900">
            <div class="flex flex-col gap-1">
              <a href="/dashboard/craftsadmin/{{ $craft->id }}" class="btn btn-xs btn-info btn-outline">
                Detail</a>
              <a href="/dashboard/craftsadmin/editcraft/{{ $craft->id }}" class="btn btn-xs btn-warning btn-outline">
                Ubah</a>
              <form action="/dashboard/craftsadmin/deletecraft/{{ $craft->id }}" method="post">
                @method('delete')
                @csrf
                <button class="btn btn-xs btn-error btn-outline w-full " onclick="return confirm('Hapus Kerajinan?')">
                  Hapus</button>
              </form>
              @if ($craft->is_confirmed)
              <a href="/dashboard/craftsadmin/isconfirmed/{{ $craft->id }}"
                class="btn btn-xs btn-secondary btn-outline">
                Batalkan Persetujuan</a>
              @else
              <a href="/dashboard/craftsadmin/isconfirmed/{{ $craft->id }}" class="btn btn-xs btn-success btn-outline">
                Setujui</a>
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
    $('#konfirmasi-kerajinan').DataTable({
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