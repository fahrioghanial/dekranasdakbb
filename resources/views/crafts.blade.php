@extends('layouts.main')

@section('navbar')
@include('layouts.navbar', ['categories' => $categories])
@endsection

@section('footer')
@include('layouts.footer')
@endsection

@section('body')
<section id="home" class="mb-32">
  <div class="container m-auto pt-28 text-black">
    <h1 class="font-bold md:text-4xl text-2xl mb-2">Produk Kerajinan</h1>
    <h1 class="font-bold md:text-3xl text-xl mb-10">{{ $title }}</h1>
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 items-start">
      @if ($crafts->count())
      @foreach ($crafts as $craft)
      <div class="card w-full bg-white shadow-xl">
        <figure><img src="{{ asset('storage/'. $craft->image) }}" alt="{{ $craft->title }}" /></figure>
        <div class="card-body">
          <h2 class="card-title">
            {{ $craft->title }}
            <div class="badge badge-secondary hover:bg-slate-700"><a href="/categories/{{ $craft->category->slug }}">{{
                $craft->category->name }}</a></div>
          </h2>
          <p>{{ $craft->price }}</p>
          <a class="hover:text-[#DBC8AC]" href="/craftsman/{{ $craft->craftsman->username }}">Oleh: {{
            $craft->craftsman->name
            }}</a>
          <div class="card-actions justify-between items-center mt-3">
            <a class="rounded-lg text-white bg-blue-600 md:text-xl py-2 px-3 hover:bg-blue-800 w-fit"
              href="/craft/detail/{{ $craft->id }}">
              Detail
            </a>
            <div class="badge badge-outline">{{ $craft->created_at->diffForHumans() }}</div>
          </div>
        </div>
      </div>
      @endforeach
      @else
      <h1 class="font-bold md:text-4xl text-2xl mb-2">Produk Tidak Ditemukan</h1>
      @endif
    </div>
</section>
@endsection