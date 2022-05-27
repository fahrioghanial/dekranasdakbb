@extends('dashboard.layouts.main')

@section('container')
@if(session()->has('success'))
<div class="alert alert-success alert-dismissible fade show" role="alert">
  {{ session('success') }}
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
@endif

<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
  <h1 class="h2">Kategori Produk</h1>
</div>

<div class="table-responsive">
  <a href="/dashboard/categories/create" class="btn btn-primary mb-4">Buat Kategori baru</a>
  <table class="table table-striped table-sm">
    <thead>
      <tr>
        <th scope="col">#</th>
        <th scope="col">Nama Kategori</th>
      </tr>
    </thead>
    <tbody>
      @foreach ($categories as $category)
      <tr class="align-middle">
        <td>{{ $loop->iteration }}</td>
        <td>{{ $category->name }}</td>
        <td>
          <a href="/dashboard/categories/{{ $category->id }}/edit" class="badge bg-warning"><span
              data-feather="edit"></span>
            Edit</a>
          <form action="/dashboard/categories/{{ $category->id }}" method="post" class="d-inline">
            @method('delete')
            @csrf
            <button class="badge bg-danger border-0" onclick="return confirm('Hapus Kategori?')"><span
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