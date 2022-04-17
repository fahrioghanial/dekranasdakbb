@extends('layouts.main')

@section('navbar')
@include('layouts.navbar')
@endsection

@section('footer')
@include('layouts.footer')
@endsection

@section('body')
<div class="container mt-4">
  <h1>Produk Kerajinan {{ $crafts[0]->craftsman->name }}</h1>

</div>

<div class="py-5 bg-light">
  <div class="container">
    <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">

      @foreach ($crafts as $craft)
      <div class="col">
        <div class="card shadow-md">
          <img class="card-img-top" src="/img/contoh-logo.jpg" alt="logo">

          <div class="card-body">
            <h1 class="card-title">{{ $craft->title }}</h1>
            <p class="card-text">{{ $craft->price }}</p>
            <p class="card-text"><a href="/categories/{{ $craft->category->slug }}">{{ $craft->category->name }}</a></p>
            <p class="card-text"><a href="/craftsman/{{ $craft->craftsman->username }}">{{ $craft->craftsman->name
                }}</a>
            </p>
            <div class="d-flex justify-content-between align-items-center">
              <div class="btn-group">
                <a href="/detail/{{ $craft->slug }}" type="button" class="btn btn-md btn-outline-secondary">Detail</a>
              </div>
              <small class="text-muted">9 mins</small>
            </div>
          </div>
        </div>
      </div>
      @endforeach
    </div>
  </div>
</div>
@endsection