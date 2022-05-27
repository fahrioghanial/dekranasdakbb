@extends('dashboard.layouts.main')

@section('container')
@if(session()->has('success'))
<div class="alert alert-success alert-dismissible fade show" role="alert">
  {{ session('success') }}
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
@endif

<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
  <h1 class="h2">Admin Kerajinan</h1>
</div>



<div class="table-responsive">
  <a href="/dashboard/confirmallcrafts" class="btn btn-primary mb-4">Setujui Semua Produk</a>
  <table class="table table-striped table-sm">
    <thead>
      <tr>
        <th scope="col">#</th>
        <th scope="col">Foto</th>
        <th scope="col">Judul</th>
        <th scope="col">Pembuat</th>
        <th scope="col">Kategori</th>
        <th scope="col">Harga</th>
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
        <td>{{ $craft->craftsman->name }}</td>
        <td>{{ $craft->category->name }}</td>
        <td>{{ $craft->price }}</td>
        <td>
          <a href="/dashboard/craftsadmin/{{ $craft->id }}" class="badge bg-info"><span data-feather="eye"></span>
            Detail</a>
          @if ($craft->is_confirmed)
          <a href="/dashboard/crafts/admin/{{ $craft->id }}" class="badge bg-danger"><span
              data-feather="x-circle"></span>
            Batalkan Persetujuan</a>
          @else
          <a href="/dashboard/crafts/admin/{{ $craft->id }}" class="badge bg-success"><span
              data-feather="check-circle"></span>
            Setujui</a>
          @endif
        </td>
      </tr>
      @endforeach
    </tbody>
  </table>
</div>
@endsection