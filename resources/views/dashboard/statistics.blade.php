@extends('dashboard.layouts.main')

@section('container')

<div class="mx-2 md:ml-80 pt-24 pb-5 md:mr-5">
  {{-- <p class="text-2xl font-semibold mb-5">Statistik</p> --}}
  <div class="grid grid-cols-1 md:grid-cols-3 gap-5 md:justify-items-start justify-items-center">
    <div
      class="w-72 bg-white max-w-xs rounded-md shadow-lg hover:shadow-2xl transition duration-500 transform hover:scale-100">
      <div class="h-20 bg-red-700 flex items-center rounded-t-md justify-between">
        <p class="mr-0 text-white text-xl pl-5">Anggota Perajin</p>
      </div>
      <div class="flex justify-between px-5 pt-6 mb-2 text-sm text-black">
        <p>TOTAL</p>
      </div>
      <p class="py-4 text-3xl ml-5 text-black">{{ $craftsman_total }}</p>
    </div>
    <div
      class="w-72 bg-white max-w-xs rounded-md  shadow-lg hover:shadow-2xl transition duration-500 transform hover:scale-100">
      <div class="h-20 bg-red-700 flex items-center rounded-t-md justify-between">
        <p class="mr-0 text-white text-xl pl-5">Produk Kerajinan</p>
      </div>
      <div class="flex justify-between px-5 pt-6 mb-2 text-sm text-black">
        <p>TOTAL</p>
      </div>
      <p class="py-4 text-3xl ml-5 text-black">{{ $craft_total }}</p>
    </div>
    <div
      class="w-72 bg-white max-w-xs rounded-md  shadow-lg hover:shadow-2xl transition duration-500 transform hover:scale-100">
      <div class="h-20 bg-red-700 flex items-center rounded-t-md justify-between">
        <p class="mr-0 text-white text-xl pl-5">Kategori Produk</p>
      </div>
      <div class="flex justify-between px-5 pt-6 mb-2 text-sm text-black">
        <p>TOTAL</p>
      </div>
      <p class="py-4 text-3xl ml-5 text-black">{{ $category_total }}</p>
    </div>
    <div
      class="w-72 bg-white max-w-xs rounded-md  shadow-lg hover:shadow-2xl transition duration-500 transform hover:scale-100">
      <div class="h-20 bg-red-700 flex items-center rounded-t-md justify-between">
        <p class="mr-0 text-white text-xl pl-5">Pengunjung Produk</p>
      </div>
      <div class="flex justify-between px-5 pt-6 mb-2 text-sm text-black">
        <p>TOTAL</p>
      </div>
      <p class="py-4 text-3xl ml-5 text-black">{{ $view_total }}</p>
    </div>
    <div
      class="w-72 bg-white max-w-xs rounded-md  shadow-lg hover:shadow-2xl transition duration-500 transform hover:scale-100">
      <div class="h-20 bg-red-700 flex items-center rounded-t-md justify-between">
        <p class="mr-0 text-white text-xl pl-5">Artikel</p>
      </div>
      <div class="flex justify-between px-5 pt-6 mb-2 text-sm text-black">
        <p>TOTAL</p>
      </div>
      <p class="py-4 text-3xl ml-5 text-black">{{ $article_total }}</p>
    </div>
    <div
      class="w-72 bg-white max-w-xs rounded-md  shadow-lg hover:shadow-2xl transition duration-500 transform hover:scale-100">
      <div class="h-20 bg-red-700 flex items-center rounded-t-md justify-between">
        <p class="mr-0 text-white text-xl pl-5">Pengunjung Web</p>
      </div>
      <div class="flex justify-between px-5 pt-6 mb-2 text-sm text-black">
        <p>TOTAL</p>
      </div>
      <p class="py-4 text-3xl ml-5 text-black">{{ $web_viewer_count }}</p>
    </div>
  </div>
  {{-- Kategori Produk --}}
  <p class="text-2xl font-semibold mt-7 mb-5 w-fit mx-auto md:mx-0 text-white">Kategori Produk</p>
  <div class="flex gap-5 md:flex-row flex-col overflow-auto">
    <div
      class="w-72 max-w-xs mx-auto md:mx-0 rounded-md shadow-lg hover:shadow-2xl transition duration-500 transform hover:scale-100">
      <p class="mr-0 text-white text-md pb-3">Kategori dengan Produk Terbanyak</p>
      <div class="h-20 bg-red-700 flex items-center rounded-t-md justify-between">
        <p class="mr-0 text-white text-xl pl-5">
          @if ($category_with_highest_product->count() > 1)
          {{ $category_with_highest_product->first()->name }} (dan {{ $category_with_highest_product->count()-1 }}
          kategori lainnya)
          @else
          {{ $category_with_highest_product->first()->name}}
          @endif
        </p>
      </div>
      <div class="bg-white rounded-b-md">
        <div class="flex justify-between px-5 pt-6 mb-2 text-sm text-black">
          <p>TOTAL PRODUK</p>
        </div>
        <p class="py-4 text-3xl ml-5 text-black">{{ $category_with_highest_product[0]->crafts_count }}</p>
      </div>
    </div>
    <div
      class="w-72 max-w-xs mx-auto md:mx-0 rounded-md shadow-lg hover:shadow-2xl transition duration-500 transform hover:scale-100">
      <p class="mr-0 text-white text-md pb-3">Kategori dengan Produk Terendah</p>
      <div class="h-20 bg-red-700 flex items-center rounded-t-md justify-between">
        <p class="mr-0 text-white text-xl pl-5">
          @if ($category_with_lowest_product->count() > 1)
          {{ $category_with_lowest_product->first()->name }} (dan {{ $category_with_lowest_product->count()-1 }}
          kategori lainnya)
          @else
          {{ $category_with_lowest_product->first()->name}}
          @endif
        </p>
      </div>
      <div class="bg-white rounded-b-md">
        <div class="flex justify-between px-5 pt-6 mb-2 text-sm text-black">
          <p>TOTAL PRODUK</p>
        </div>
        <p class="py-4 text-3xl ml-5 text-black">{{ $category_with_lowest_product->first()->crafts_count }}</p>
      </div>
    </div>
  </div>
  {{-- Anggota Perajin --}}
  <p class="text-2xl font-semibold mt-7 mb-5 w-fit mx-auto md:mx-0 text-white">Anggota Perajin</p>
  <div class="flex gap-5 md:flex-row flex-col overflow-auto">
    <div
      class="w-72 max-w-xs mx-auto md:mx-0 rounded-md shadow-lg hover:shadow-2xl transition duration-500 transform hover:scale-100">
      <p class="mr-0 text-white text-md pb-3">Perajin dengan Produk Terbanyak</p>
      <div class="h-20 bg-red-700 flex items-center rounded-t-md justify-between">
        <p class="mr-0 text-white text-xl pl-5">
          @if ($craftsman_with_highest_product->count() > 1)
          {{ $craftsman_with_highest_product->first()->name }} (dan {{ $craftsman_with_highest_product->count()-1 }}
          perajin lainnya)
          @else
          {{ $craftsman_with_highest_product->first()->name}}
          @endif
        </p>
      </div>
      <div class="bg-white rounded-b-md">
        <div class="flex justify-between px-5 pt-6 mb-2 text-sm text-black">
          <p>TOTAL PRODUK</p>
        </div>
        <p class="py-4 text-3xl ml-5 text-black">{{ $craftsman_with_highest_product->first()->crafts_count }}</p>
      </div>
    </div>
    <div
      class="w-72 max-w-xs mx-auto md:mx-0 rounded-md shadow-lg hover:shadow-2xl transition duration-500 transform hover:scale-100">
      <p class="mr-0 text-white text-md pb-3">Perajin dengan Produk Terendah</p>
      <div class="h-20 bg-red-700 flex items-center rounded-t-md justify-between">
        <p class="mr-0 text-white text-xl pl-5">
          @if ($craftsman_with_lowest_product->count() > 1)
          {{ $craftsman_with_lowest_product->first()->name }} (dan {{ $craftsman_with_lowest_product->count()-1 }}
          perajin lainnya)
          @else
          {{ $craftsman_with_lowest_product->first()->name}}
          @endif
        </p>
      </div>
      <div class="bg-white rounded-b-md">
        <div class="flex justify-between px-5 pt-6 mb-2 text-sm text-black">
          <p>TOTAL PRODUK</p>
        </div>
        <p class="py-4 text-3xl ml-5 text-black">{{ $craftsman_with_lowest_product->first()->crafts_count }}</p>
      </div>
    </div>
  </div>
  {{--Harga Produk Kerajinan --}}
  <p class="text-2xl font-semibold mt-7 mb-5 w-fit mx-auto md:mx-0 text-white">Harga Produk Kerajinan</p>
  <div class="flex gap-5 md:flex-row flex-col overflow-auto">
    <div
      class="w-72 max-w-xs mx-auto md:mx-0 rounded-md shadow-lg hover:shadow-2xl transition duration-500 transform hover:scale-100">
      <p class="mr-0 text-white text-md pb-3">Produk Termahal</p>
      <div class="h-20 bg-red-700 flex items-center rounded-t-md">
        <div class="flex flex-col gap-1">
          <p class="text-white pl-5 text-xl ">
            @if ($expensive_product->count() > 1)
            {{ $expensive_product->first()->title }} (dan {{ $expensive_product->count()-1 }}
            produk lainnya)
            @else
            {{ $expensive_product->first()->title}}
            @endif
          </p>
          <p class="text-white pl-5 text-sm">
            {{ $expensive_product->first()->craftsman->name }}
          </p>
        </div>
      </div>
      <div class="bg-white rounded-b-md">
        <div class="flex justify-between px-5 pt-6 mb-2 text-sm text-black">
          <p>HARGA</p>
        </div>
        <p class="py-4 text-3xl ml-5 text-black">Rp{{ $expensive_product->first()->price}}</p>
      </div>
    </div>
    <div
      class="w-72 max-w-xs mx-auto md:mx-0 rounded-md shadow-lg hover:shadow-2xl transition duration-500 transform hover:scale-100">
      <p class="mr-0 text-white text-md pb-3">Produk Termurah</p>
      <div class="h-20 bg-red-700 flex items-center rounded-t-md">
        <div class="flex flex-col gap-1">
          <p class="text-white pl-5 text-xl ">
            @if ($cheap_product->count() > 1)
            {{ $cheap_product->first()->title }} (dan {{ $cheap_product->count()-1 }}
            produk lainnya)
            @else
            {{ $cheap_product->first()->title}}
            @endif
          </p>
          <p class="text-white pl-5 text-sm">
            {{ $cheap_product->first()->craftsman->name }}
          </p>
        </div>
      </div>
      <div class="bg-white rounded-b-md">
        <div class="flex justify-between px-5 pt-6 mb-2 text-sm text-black">
          <p>HARGA</p>
        </div>
        <p class="py-4 text-3xl ml-5 text-black">Rp{{ $cheap_product->first()->price}}</p>
      </div>
    </div>
  </div>
  {{--Pengunjung Produk Kerajinan --}}
  <p class="text-2xl font-semibold mt-7 mb-5 w-fit mx-auto md:mx-0 text-white">Pengunjung Produk Kerajinan</p>
  <div class="flex gap-5 md:flex-row flex-col overflow-auto">
    <div
      class="w-72 max-w-xs mx-auto md:mx-0 rounded-md shadow-lg hover:shadow-2xl transition duration-500 transform hover:scale-100">
      <p class="mr-0 text-white text-md pb-3">Produk dengan Pengunjung Terbanyak</p>
      <div class="h-20 bg-red-700 flex items-center rounded-t-md justify-between">
        <div class="flex flex-col gap-1">
          <p class="text-white pl-5 text-xl ">
            @if ($most_viewed_product->count() > 1)
            {{ $most_viewed_product->first()->title }} (dan {{ $most_viewed_product->count()-1 }}
            produk lainnya)
            @else
            {{ $most_viewed_product->first()->title}}
            @endif
          </p>
          <p class="text-white pl-5 text-sm">
            {{ $most_viewed_product->first()->craftsman->name }}
          </p>
        </div>
      </div>
      <div class="bg-white rounded-b-md">
        <div class="flex justify-between px-5 pt-6 mb-2 text-sm text-black">
          <p>JUMLAH PENGUNJUNG</p>
        </div>
        <p class="py-4 text-3xl ml-5 text-black">{{ $most_viewed_product->first()->views}}</p>
      </div>
    </div>
    <div
      class="w-72 max-w-xs mx-auto md:mx-0 rounded-md shadow-lg hover:shadow-2xl transition duration-500 transform hover:scale-100">
      <p class="mr-0 text-white text-md pb-3">Produk dengan Pengunjung Terendah</p>
      <div class="h-20 bg-red-700 flex items-center rounded-t-md justify-between">
        <div class="flex flex-col gap-1">
          <p class="text-white pl-5 text-xl ">
            @if ($less_viewed_product->count() > 1)
            {{ $less_viewed_product->first()->title }} (dan {{ $less_viewed_product->count()-1 }}
            produk lainnya)
            @else
            {{ $less_viewed_product->first()->title}}
            @endif
          </p>
          <p class="text-white pl-5 text-sm">
            {{ $less_viewed_product->first()->craftsman->name }}
          </p>
        </div>
      </div>
      <div class="bg-white rounded-b-md">
        <div class="flex justify-between px-5 pt-6 mb-2 text-sm text-black">
          <p>JUMLAH PENGUNJUNG</p>
        </div>
        <p class="py-4 text-3xl ml-5 text-black">{{ $less_viewed_product->first()->views}}</p>
      </div>
    </div>
  </div>
</div>
@endsection