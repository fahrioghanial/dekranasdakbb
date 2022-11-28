@extends('layouts.main')

@section('navbar')
@include('layouts.navbar', ['categories' => $categories])
@endsection

@section('footer')
@include('layouts.footer')
@endsection

@section('body')
<section id="home" class="mb-32">
  <div class="container m-auto pt-24 text-black px-3 md:px-0">
    <h1 class="font-bold md:text-4xl text-2xl mb-2">Produk Kerajinan</h1>
    <h1 class="font-bold md:text-3xl text-xl mb-5">{{ $title }}</h1>
    <form action="/crafts" class="mb-3">
      <div class="flex w-1/2">
        <input type="text" name="search" class="input input-bordered bg-white md:w-4/5 text-black" id="search"
          placeholder="Cari Produk Kerajinan..." value="{{ request('search') }}">
        <button class="bg-blue-600 py-2 px-3 hover:bg-blue-900 rounded-lg text-white text-xl font-semibold"
          type="submit">Cari</button>
      </div>
    </form>

    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 items-stretch">
      @if ($crafts->count())
      @foreach ($crafts as $craft)
      @if ($craft->craftsman->status_keanggotaan)
      <div class="card w-full bg-white shadow-xl">
        <img class="object-cover object-center h-[330px] w-full" src="{{ asset('storage/'. $craft->image) }}"
          alt="{{ $craft->title }}" />
        {{-- <img class="object-cover object-center h-[330px] w-full"
          src="https://picsum.photos/id/{{ $loop->iteration + 50 }}/200" alt="{{ $craft->title }}" /> --}}
        <div class="card-body p-4">
          <h2 class="card-title">
            {{ $craft->title }}
            <div class="badge badge-secondary hover:bg-slate-700"><a
                href="/crafts?category={{ $craft->category->slug }}">{{
                $craft->category->name }}</a></div>
          </h2>
          <p>Rp{{ $craft->price }}</p>
          <a class="hover:text-[#DBC8AC] text-blue-700" href="/crafts?craftsman={{ $craft->craftsman->username }}">Oleh:
            {{
            $craft->craftsman->name
            }}</a>
          <div class="card-actions justify-between items-center mt-3">
            <a class="rounded-lg text-white bg-blue-600 md:text-xl py-2 px-3 hover:bg-blue-800 w-fit"
              href="/crafts/detail/{{ $craft->slug }}">
              Detail
            </a>
            <div class="badge badge-outline">{{ $craft->created_at->diffForHumans() }}</div>
          </div>
        </div>
      </div>
      @endif
      @endforeach
      @else
      <h1 class="font-bold md:text-4xl text-2xl mb-2">Produk Tidak Ditemukan</h1>
      @endif
    </div>
    {{ $crafts->links() }}
  </div>
</section>
@endsection