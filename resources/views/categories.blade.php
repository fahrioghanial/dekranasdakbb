@extends('layouts.main')

@section('navbar')
@include('layouts.navbar')
@endsection

@section('footer')
@include('layouts.footer')
@endsection

@section('body')
<div class="container mt-4">
  <h1>Kategori Kerajinan</h1>
</div>

<div class="py-5 bg-light">
  <div class="container">

    @foreach($categories as $category)
    <ul>
      <li>
        <h1>
          <a href="/categories/{{ $category->slug }}">{{ $category->name }}</a>
        </h1>
      </li>
    </ul>
    @endforeach
    <a href="/">Back to Home</a>
  </div>
</div>
</div>
@endsection