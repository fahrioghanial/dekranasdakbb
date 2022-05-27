@extends('dashboard.layouts.main')

@section('container')
@if(session()->has('success'))
<div class="alert alert-success alert-dismissible fade show" role="alert">
  {{ session('success') }}
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
@endif

<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
  <h1 class="h2">Kerajinan Saya</h1>
</div>

<div class="table-responsive">
  <a href="/dashboard/crafts/create" class="btn btn-primary mb-4">Buat kerajinan baru</a>
  <table class="table table-striped table-sm">
    <thead>
      <tr>
        <th scope="col">#</th>
        <th scope="col">Foto</th>
        <th scope="col">Judul</th>
        <th scope="col">Kategori</th>
        <th scope="col">Harga</th>
        <th scope="col">Status Persetujuan</th>
        <th scope="col">Aksi</th>
      </tr>
    </thead>
    <tbody>
      @foreach ($crafts as $craft)
      <tr class="align-middle">
        <td>{{ $loop->iteration }}</td>
        <td>
          <img src="{{ asset('storage/'. $craft->image)  }}" class="img-fluid" width="200" alt="{{ $craft->title }}">
        </td>
        <td>{{ $craft->title }}</td>
        <td>{{ $craft->category->name }}</td>
        <td>{{ $craft->price }}</td>
        <td>{{ $craft->is_confirmed ? "Disetujui" : "Menunggu Persetujuan" }}</td>
        <td>
          <a href="/dashboard/crafts/{{ $craft->id }}" class="badge bg-info"><span data-feather="eye"></span> Detail</a>
          <a href="/dashboard/crafts/{{ $craft->id }}/edit" class="badge bg-warning"><span data-feather="edit"></span>
            Edit</a>
          <form action="/dashboard/crafts/{{ $craft->id }}" method="post" class="d-inline">
            @method('delete')
            @csrf
            <button class="badge bg-danger border-0" onclick="return confirm('Hapus Kerajinan?')"><span
                data-feather="x-circle"></span>
              Hapus</button>
          </form>
        </td>
      </tr>
      @endforeach
    </tbody>
  </table>
</div>
@endsection