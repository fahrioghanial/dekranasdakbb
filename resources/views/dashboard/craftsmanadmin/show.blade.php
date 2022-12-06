@extends('dashboard.layouts.main')

@section('container')
<div class="mx-2 md:ml-80 pt-24 pb-5 md:mr-5 text-white">
  <p class="text-2xl font-semibold mb-5">Profil {{ $user->name }}</p>
  <div class="flex flex-col md:flex-row mb-7 bg-slate-900 rounded-md items-center pt-5 md:pt-0 md:pl-5">
    <img src="{{ asset('storage/'. $user->profile_picture)  }}" class="w-1/2 md:w-1/3 rounded-md"
      alt="{{ $user->name }}">
    <div class="card-body md:text-xl">
      <h2>Nama Lengkap: {{ $user->name }}</h2>
      <h2>Email: {{ $user->email }}</h2>
      <h2>Nomor KTP: {{ $user->noktp }}</h2>
      <h2>Alamat: {{ $user->address }}</h2>
      <h2>RT: {{ $user->rt }}</h2>
      <h2>RW: {{ $user->rw }}</h2>
      <h2>Kecamatan: {{ $user->kecamatan }}</h2>
      <h2>Kelurahan/Desa: {{ $user->kelurahan_desa }}</h2>
      <h2>Kode Pos: {{ $user->kodepos }}</h2>
      <h2>Nomor HP: {{ $user->contact }}</h2>
      <h2>Facebook: {{ $user->facebook }}</h2>
      <h2>Instagram: {{ $user->instagram }}</h2>
      <h2>Whatsapp: {{ $user->whatsapp }}</h2>
      <h2>
        Status Keanggotaan:
        @if ($user->is_admin)
        {{" Administrator"}}
        @else
        {{ $user->status_keanggotaan ? " Anggota Perajin" : " Menunggu Persetujuan" }}
        @endif
      </h2>
      <div class="card-actions md:justify-end">
        <a href="/dashboard/adminuser/edituser/{{ $user->username }}" class="btn btn-warning w-full md:w-fit">
          Ubah</a>
        <a href="/dashboard/craftsadmin/createcraft/{{ $user->username }}"
          class="btn bg-blue-300 text-black border-0 w-full md:w-fit">
          Tambah Produk</a>
        @if (!$user->is_admin )
        <form action="/dashboard/adminuser/delete/{{ $user->username }}" method="post">
          @method('delete')
          @csrf
          <button class="btn btn-error w-full md:w-fit"
            onclick="return confirm('Menghapus anggota perajin juga akan menghapus produk atas nama anggota tersebut! Hapus anggota perajin?')">
            Hapus</button>
        </form>
        @if ($user->status_keanggotaan)
        <a href="/dashboard/adminuser/membership/{{ $user->username }}" class="btn btn-secondary w-full md:w-fit">
          Cabut Keanggotaan</a>
        @else
        <a href="/dashboard/adminuser/membership/{{ $user->username }}"
          class="btn bg-green-600 border-0 text-white w-full md:w-fit">
          Terima</a>
        @endif
        @endif
        <a href="/dashboard/adminuser" class="btn bg-blue-600 text-white border-0 w-full md:w-fit">
          Kembali</a>
      </div>
    </div>
  </div>
</div>
@endsection