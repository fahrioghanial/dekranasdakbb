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
    <div class="flex flex-col md:flex-row justify-between">
      <form action="/crafts" class="mb-3 md:w-1/2">
        <div class="flex gap-1">
          @if (request('category'))
          <input type="hidden" name="category" class="input input-bordered bg-white text-black" id="category"
            value="{{ request('category') }}">
          @endif
          @if (request('craftsman'))
          <input type="hidden" name="craftsman" class="input input-bordered bg-white text-black" id="craftsman"
            value="{{ request('craftsman') }}">
          @endif
          <div class="flex w-2/3">
            <input type="text" name="search"
              class="input input-bordered rounded-r-none border-r-none bg-white md:w-4/5 text-black" id="search"
              placeholder="Cari Produk Kerajinan..." value="{{ request('search') }}">
            <button
              class="bg-[#e00024] py-2 px-3 hover:bg-[#FF9684] rounded-l-none border-l-none rounded-lg text-white text-xl font-semibold"
              type="submit">Cari</button>
          </div>
          <a class="bg-[#e00024] py-3 px-2 hover:bg-[#FF9684] rounded-lg text-white text-md font-semibold {{ (request('search')||request('craftsman')||request('category'))?"":"
            hidden" }}" href="/crafts">Tampilkan Semua Produk</a>
        </div>
      </form>
      <form action="/crafts" class="mb-3 md:w-1/4" id="sortby">
        <div class="flex">
          @if (request('category'))
          <input type="hidden" name="category" class="input input-bordered bg-white text-black" id="category"
            value="{{ request('category') }}">
          @endif
          @if (request('craftsman'))
          <input type="hidden" name="craftsman" class="input input-bordered bg-white text-black" id="craftsman"
            value="{{ request('craftsman') }}">
          @endif
          @if (request('search'))
          <input type="hidden" name="search" class="input input-bordered bg-white text-black" id="search"
            value="{{ request('search') }}">
          @endif
          <select name="sortby" class="select text-black rounded-r-none border-r-none bg-white w-2/3">
            <option disabled selected>Urutkan Berdasarkan</option>
            <option @if(request('sortby')=="termurah" )selected @endif value="termurah">Harga Termurah</option>
            <option @if(request('sortby')=="termahal" )selected @endif value="termahal">Harga Termahal</option>
            <option @if(request('sortby')=="terbaru" )selected @endif value="terbaru">Terbaru</option>
            <option @if(request('sortby')=="terlama" )selected @endif value="terlama">Terlama</option>
          </select>
          <button
            class="bg-[#e00024] py-2 px-3 hover:bg-[#FF9684] rounded-l-none border-l-none rounded-lg text-white text-md font-semibold"
            type="submit">Terapkan</button>
        </div>
      </form>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 items-stretch">
      @if ($crafts->count())
      @if (request('sortby')=="termurah")
      @foreach ($crafts->sortBy('price') as $craft)
      @if ($craft->craftsman->status_keanggotaan)
      <div class="card w-full bg-white shadow-xl">
        <img class="object-cover object-center h-[330px] w-full" src="{{ asset('storage/'. $craft->image) }}"
          alt="{{ $craft->title }}" />
        {{-- <img class="object-cover object-center h-[330px] w-full"
          src="https://picsum.photos/id/{{ $loop->iteration + 50 }}/200" alt="{{ $craft->title }}" /> --}}
        <div class="card-body p-4">
          <h2 class="card-title">
            <div>
              <div class="badge border-[#e00024] bg-white text-[#e00024]  border-1 hover:bg-[#e00024] hover:text-white">
                <a href="/crafts?category={{ $craft->category->slug }}">{{
                  $craft->category->name }}</a>
              </div>
              <p>{{ $craft->title }}</p>
            </div>
          </h2>
          <p>Rp{{ $craft->price }}</p>
          <a class="hover:text-[#DBC8AC] text-blue-700" href="/crafts?craftsman={{ $craft->craftsman->username }}">Oleh:
            {{
            $craft->craftsman->business_name
            }}</a>
          <div class="card-actions justify-between items-center mt-3">
            <a class="rounded-lg text-white bg-[#e00024] md:text-xl py-2 px-3 hover:bg-[#FF9684] w-fit"
              href="/crafts/detail/{{ $craft->slug }}">
              Detail
            </a>
            <div class="badge badge-outline">{{ $craft->created_at->diffForHumans() }}</div>
          </div>
        </div>
      </div>
      @endif
      @endforeach
      @elseif (request('sortby')=="termahal")
      @foreach ($crafts->sortByDesc('price') as $craft)
      @if ($craft->craftsman->status_keanggotaan)
      <div class="card w-full bg-white shadow-xl">
        <img class="object-cover object-center h-[330px] w-full" src="{{ asset('storage/'. $craft->image) }}"
          alt="{{ $craft->title }}" />
        {{-- <img class="object-cover object-center h-[330px] w-full"
          src="https://picsum.photos/id/{{ $loop->iteration + 50 }}/200" alt="{{ $craft->title }}" /> --}}
        <div class="card-body p-4">
          <h2 class="card-title">
            <div>
              <div class="badge border-[#e00024] bg-white text-[#e00024] border-1 hover:bg-[#e00024] hover:text-white">
                <a href="/crafts?category={{ $craft->category->slug }}">{{
                  $craft->category->name }}</a>
              </div>
              <p>{{ $craft->title }}</p>
            </div>
          </h2>
          <p>Rp{{ $craft->price }}</p>
          <a class="hover:text-[#DBC8AC] text-blue-700" href="/crafts?craftsman={{ $craft->craftsman->username }}">Oleh:
            {{
            $craft->craftsman->business_name
            }}</a>
          <div class="card-actions justify-between items-center mt-3">
            <a class="rounded-lg text-white bg-[#e00024] md:text-xl py-2 px-3 hover:bg-[#FF9684] w-fit"
              href="/crafts/detail/{{ $craft->slug }}">
              Detail
            </a>
            <div class="badge badge-outline">{{ $craft->created_at->diffForHumans() }}</div>
          </div>
        </div>
      </div>
      @endif
      @endforeach
      @elseif (request('sortby')=="terbaru")
      @foreach ($crafts->sortBy('created_at') as $craft)
      @if ($craft->craftsman->status_keanggotaan)
      <div class="card w-full bg-white shadow-xl">
        <img class="object-cover object-center h-[330px] w-full" src="{{ asset('storage/'. $craft->image) }}"
          alt="{{ $craft->title }}" />
        {{-- <img class="object-cover object-center h-[330px] w-full"
          src="https://picsum.photos/id/{{ $loop->iteration + 50 }}/200" alt="{{ $craft->title }}" /> --}}
        <div class="card-body p-4">
          <h2 class="card-title">
            <div>
              <div class="badge border-[#e00024] bg-white text-[#e00024] border-1 hover:bg-[#e00024] hover:text-white">
                <a href="/crafts?category={{ $craft->category->slug }}">{{
                  $craft->category->name }}</a>
              </div>
              <p>{{ $craft->title }}</p>
            </div>
          </h2>
          <p>Rp{{ $craft->price }}</p>
          <a class="hover:text-[#DBC8AC] text-blue-700" href="/crafts?craftsman={{ $craft->craftsman->username }}">Oleh:
            {{
            $craft->craftsman->business_name
            }}</a>
          <div class="card-actions justify-between items-center mt-3">
            <a class="rounded-lg text-white bg-[#e00024] md:text-xl py-2 px-3 hover:bg-[#FF9684] w-fit"
              href="/crafts/detail/{{ $craft->slug }}">
              Detail
            </a>
            <div class="badge badge-outline">{{ $craft->created_at->diffForHumans() }}</div>
          </div>
        </div>
      </div>
      @endif
      @endforeach
      @elseif (request('sortby')=="terlama")
      @foreach ($crafts->sortByDesc('created_at') as $craft)
      @if ($craft->craftsman->status_keanggotaan)
      <div class="card w-full bg-white shadow-xl">
        <img class="object-cover object-center h-[330px] w-full" src="{{ asset('storage/'. $craft->image) }}"
          alt="{{ $craft->title }}" />
        {{-- <img class="object-cover object-center h-[330px] w-full"
          src="https://picsum.photos/id/{{ $loop->iteration + 50 }}/200" alt="{{ $craft->title }}" /> --}}
        <div class="card-body p-4">
          <h2 class="card-title">
            <div>
              <div class="badge border-[#e00024] bg-white text-[#e00024] border-1 hover:bg-[#e00024] hover:text-white">
                <a href="/crafts?category={{ $craft->category->slug }}">{{
                  $craft->category->name }}</a>
              </div>
              <p>{{ $craft->title }}</p>
            </div>
          </h2>
          <p>Rp{{ $craft->price }}</p>
          <a class="hover:text-[#DBC8AC] text-blue-700" href="/crafts?craftsman={{ $craft->craftsman->username }}">Oleh:
            {{
            $craft->craftsman->business_name
            }}</a>
          <div class="card-actions justify-between items-center mt-3">
            <a class="rounded-lg text-white bg-[#e00024] md:text-xl py-2 px-3 hover:bg-[#FF9684] w-fit"
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
      @foreach ($crafts as $craft)
      @if ($craft->craftsman->status_keanggotaan)
      <div class="card w-full bg-white shadow-xl">
        <img class="object-cover object-center h-[330px] w-full" src="{{ asset('storage/'. $craft->image) }}"
          alt="{{ $craft->title }}" />
        {{-- <img class="object-cover object-center h-[330px] w-full"
          src="https://picsum.photos/id/{{ $loop->iteration + 50 }}/200" alt="{{ $craft->title }}" /> --}}
        <div class="card-body p-4">
          <h2 class="card-title">
            <div>
              <div class="badge border-[#e00024] bg-white text-[#e00024] border-1 hover:bg-[#e00024] hover:text-white">
                <a href="/crafts?category={{ $craft->category->slug }}">{{
                  $craft->category->name }}</a>
              </div>
              <p>{{ $craft->title }}</p>
            </div>
          </h2>
          <p>Rp{{ $craft->price }}</p>
          <a class="hover:text-[#DBC8AC] text-blue-700" href="/crafts?craftsman={{ $craft->craftsman->username }}">Oleh:
            {{
            $craft->craftsman->business_name
            }}</a>
          <div class="card-actions justify-between items-center mt-3">
            <a class="rounded-lg text-white bg-[#e00024] md:text-xl py-2 px-3 hover:bg-[#FF9684] w-fit"
              href="/crafts/detail/{{ $craft->slug }}">
              Detail
            </a>
            <div class="badge badge-outline">{{ $craft->created_at->diffForHumans() }}</div>
          </div>
        </div>
      </div>
      @endif
      @endforeach
      @endif
      @else
      <h1 class="font-bold md:text-4xl text-2xl mb-2">Produk Tidak Ditemukan</h1>
      @endif
    </div>
    {{ $crafts->links() }}
  </div>
</section>
@endsection