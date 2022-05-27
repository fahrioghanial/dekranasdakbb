@extends('dashboard.layouts.main')

@section('container')
@if(session()->has('success'))
<div class="alert alert-success alert-dismissible fade show" role="alert">
  {{ session('success') }}
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
@endif

<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
  <h1 class="h2">Data Perajin</h1>
</div>



<div class="table-responsive">
  <a href="/dashboard/adminuser/membership/confirmall" class="btn btn-primary mb-4">Terima Semua Perajin</a>
  <table class="table table-striped table-sm">
    <thead>
      <tr>
        <th scope="col">#</th>
        <th scope="col">Foto</th>
        <th scope="col">Nama</th>
        <th scope="col">Username</th>
        <th scope="col">Email</th>
        <th scope="col">No HP</th>
        <th scope="col">Status Keanggotaan</th>
        <th scope="col">Aksi</th>
      </tr>
    </thead>
    <tbody>
      @foreach ($users as $user)
      <tr class="align-middle">
        <td>{{ $loop->iteration }}</td>
        <td>
          <img src="{{ asset('storage/'. $user->profile_picture)  }}" class="img-fluid" width="200"
            alt="{{ $user->name }}">
        </td>
        <td>{{ $user->name }}</td>
        <td>{{ $user->username }}</td>
        <td>{{ $user->email }}</td>
        <td>{{ $user->contact }}</td>
        <td>{{ $user->status_keanggotaan ? "Diterima" : "Menunggu Persetujuan" }}</td>
        <td>
          <a href="/dashboard/adminuser/{{ $user->username }}" class="badge bg-info"><span data-feather="eye"></span>
            Detail</a>
          @if ($user->status_keanggotaan)
          <a href="/dashboard/adminuser/membership/{{ $user->username }}" class="badge bg-danger"><span
              data-feather="x-circle"></span>
            Cabut Keanggotaan</a>
          @else
          <a href="/dashboard/adminuser/membership/{{ $user->username }}" class="badge bg-success"><span
              data-feather="check-circle"></span>
            Terima</a>
          @endif
        </td>
      </tr>
      @endforeach
    </tbody>
  </table>
</div>
@endsection