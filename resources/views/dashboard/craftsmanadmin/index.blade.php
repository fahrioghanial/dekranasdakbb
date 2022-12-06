@extends('dashboard.layouts.main')

@section('container')

<div class="mx-2 md:ml-80 pt-24 pb-5 md:mr-5 text-white">
  @if(session()->has('success'))
  <div class="alert alert-success mb-3">
    {{ session('success') }}
  </div>
  @endif
  <p class="text-2xl font-semibold mb-5">Data Anggota Perajin</p>
  <div class="mb-4 flex flex-col md:flex-row gap-3">
    <a href="/dashboard/adminuser/adduser" class="btn bg-blue-600 text-white border-0">Tambah Perajin</a>
    <a href="/dashboard/adminuser/membership/confirmall" class="btn bg-green-600 text-white border-0">Terima Semua
      Perajin</a>
    <a href="/dashboard/adminuser/export" class="btn bg-white text-black hover:text-white border-0">Unduh Data
      Perajin</a>
  </div>
  <div class="p-2 bg-white rounded-lg">
    <table class="" id="data-perajin">
      <!-- head -->
      <thead class="">
        <tr class="">
          <th class="bg-slate-900">#</th>
          <th class="bg-slate-900">Foto</th>
          <th class="bg-slate-900">Nama</th>
          <th class="bg-slate-900">Email</th>
          <th class="bg-slate-900">No HP</th>
          <th class="bg-slate-900">Jumlah Produk</th>
          <th class="bg-slate-900">Tanggal Akun Dibuat</th>
          <th class="bg-slate-900">Status Keanggotaan</th>
          <th class="bg-slate-900">Terakhir Diubah Oleh</th>
          <th class="bg-slate-900">Aksi</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($users as $user)
        <tr>
          <td class="bg-slate-900">{{ $loop->iteration }}</td>
          <td class="bg-slate-900">
            <img src="{{ asset('storage/'. $user->profile_picture)  }}" class="img-fluid" width="200"
              alt="{{ $user->name }}">
          </td>
          <td class="bg-slate-900">{{ $user->name }}</td>
          <td class="bg-slate-900">{{ $user->email }}</td>
          <td class="bg-slate-900 whitespace-nowrap">{{ $user->contact }}</td>
          <td class="bg-slate-900">{{ $user->crafts_count }}</td>
          <td class="bg-slate-900 whitespace-nowrap">{{ $user->created_at->format('d-m-Y') }}</td>
          <td class="bg-slate-900">
            @if ($user->is_admin)
            {{"Administrator"}}
            @else
            {{ $user->status_keanggotaan ? "Anggota Perajin" : "Menunggu Persetujuan" }}
            @endif
          </td>
          <td class="bg-slate-900 whitespace-nowrap">
            @if (isset($user->updatedBy->name))
            {{ $user->updatedBy->name }}, pada {{ $user->updated_at->format('d-m-Y')}}
            @else
            -
            @endif
          </td>
          <td class="bg-slate-900 w-fit">
            <div class="flex flex-col gap-1 w-full">
              <div class="flex gap-1">
                <a href="/dashboard/adminuser/{{ $user->username }}" class="btn btn-xs btn-info btn-outline ">
                  Detail</a>
                <a href="/dashboard/adminuser/edituser/{{ $user->username }}"
                  class="btn btn-xs btn-warning btn-outline">
                  Ubah</a>
              </div>
              <a href="/dashboard/craftsadmin/createcraft/{{ $user->username }}"
                class="btn btn-xs hover:bg-blue-300 text-blue-300  btn-outline ">
                Tambah Produk</a>
              @if (!$user->is_admin )
              <form action="/dashboard/adminuser/delete/{{ $user->username }}" method="post">
                @method('delete')
                @csrf
                <button class="btn btn-xs btn-error btn-outline w-full "
                  onclick="return confirm('Menghapus anggota perajin juga akan menghapus produk atas nama anggota tersebut! Hapus anggota perajin?')">
                  Hapus</button>
              </form>
              @if ($user->status_keanggotaan)
              <a href="/dashboard/adminuser/membership/{{ $user->username }}"
                class="btn btn-xs btn-secondary btn-outline"
                onclick="return confirm('Mencabut keanggotaan juga akan mencabut izin produk atas nama anggota tersebut! Cabut Keanggotaan?')">
                Cabut Keanggotaan</a>
              @else
              <a href="/dashboard/adminuser/membership/{{ $user->username }}"
                class="btn btn-xs btn-success btn-outline">
                Terima</a>
              @endif
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
    $('#data-perajin').DataTable({
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