@extends('dashboard.layouts.main')

@section('container')

<div class="mx-2 md:ml-80 pt-24 pb-5 md:mr-5 text-white">
  @if(session()->has('success'))
  <div class="alert alert-success mb-3">
    {{ session('success') }}
  </div>
  @endif
  <p class="text-2xl font-semibold mb-5">Data Perajin</p>
  <a href="/dashboard/adminuser/membership/confirmall" class="btn btn-success mb-4">Terima Semua Perajin</a>
  <div class="p-2 bg-white rounded-lg">
    <table class="" id="data-perajin">
      <!-- head -->
      <thead class="">
        <tr class="">
          <th class="bg-slate-900">#</th>
          <th class="bg-slate-900">Foto</th>
          <th class="bg-slate-900">Nama</th>
          <th class="bg-slate-900">Username</th>
          <th class="bg-slate-900">Email</th>
          <th class="bg-slate-900">No HP</th>
          <th class="bg-slate-900">Jumlah Produk</th>
          <th class="bg-slate-900">Status Keanggotaan</th>
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
          <td class="bg-slate-900">{{ $user->username }}</td>
          <td class="bg-slate-900">{{ $user->email }}</td>
          <td class="bg-slate-900">{{ $user->contact }}</td>
          <td class="bg-slate-900">{{ $user->crafts_count }}</td>
          <td class="bg-slate-900">
            @if ($user->is_admin)
            {{"Administrator"}}
            @else
            {{ $user->status_keanggotaan ? "Anggota Perajin" : "Menunggu Persetujuan" }}
            @endif
          </td>
          <td class="bg-slate-900">
            <div class="flex flex-col gap-1">
              <a href="/dashboard/adminuser/{{ $user->username }}" class="btn btn-xs btn-info btn-outline">
                Detail</a>
              @if (!$user->is_admin )
              @if ($user->status_keanggotaan)
              <a href="/dashboard/adminuser/membership/{{ $user->username }}" class="btn btn-xs btn-error btn-outline">
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