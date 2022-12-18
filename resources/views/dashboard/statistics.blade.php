@extends('dashboard.layouts.main')

@section('container')

<div class="mx-2 md:ml-80 pt-24 pb-5 md:mr-5">
  {{-- Total --}}
  <div class="grid grid-cols-1 lg:grid-cols-2">
    <div>
      <p class="text-2xl font-semibold mb-5 w-fit mx-auto md:mx-0 text-white">Total</p>
      <div class="text-white text-md flex flex-col gap-1 text-lg mb-2">
        <div class="flex gap-3 mb-2">
          <p class="text-xl">•</p>
          <p class="">Total Anggota Perajin: {{ $craftsman_total }}</p>
        </div>
      </div>
      <div class="text-white text-md flex flex-col gap-1 text-lg mb-2">
        <div class="flex gap-3 mb-2">
          <p class="text-xl">•</p>
          <p class="">Total Produk Kerajinan: {{ $craft_total }}</p>
        </div>
      </div>
      <div class="text-white text-md flex flex-col gap-1 text-lg mb-2">
        <div class="flex gap-3 mb-2">
          <p class="text-xl">•</p>
          <p class="">Total Kategori Produk Kerajinan: {{ $category_total }}</p>
        </div>
      </div>
      <div class="text-white text-md flex flex-col gap-1 text-lg mb-2">
        <div class="flex gap-3 mb-2">
          <p class="text-xl">•</p>
          <p class="">Total Pengunjung Produk Kerajinan: {{ $view_total }}</p>
        </div>
      </div>
      <div class="text-white text-md flex flex-col gap-1 text-lg mb-2">
        <div class="flex gap-3 mb-2">
          <p class="text-xl">•</p>
          <p class="">Total Artikel: {{ $article_total }}</p>
        </div>
      </div>
      <div class="text-white text-md flex flex-col gap-1 text-lg mb-2">
        <div class="flex gap-3 mb-2">
          @if ($web_viewer_count)
          <p class="text-xl">•</p>
          <p class="">Total Pengunjung Web: {{ $web_viewer_count->count }}</p>
          @endif
        </div>
      </div>
    </div>
    {{-- Kategori Produk --}}
    <div>
      <p class="text-2xl font-semibold mt-7 lg:mt-0 mb-5 w-fit mx-auto md:mx-0 text-white">Kategori Produk Kerajinan</p>
      <div class="text-white text-md flex flex-col gap-1 text-lg mb-2">
        <div class="flex gap-3">
          <p class="text-xl">•</p>
          <p class="">Kategori dengan Produk Kerajinan Terbanyak:</p>
        </div>
        <p class="ml-5 font-semibold">
          @if ($category_with_highest_product->count() > 1)
          {{ $category_with_highest_product->first()->name }} (dan {{ $category_with_highest_product->count()-1 }}
          kategori lainnya)
          @else
          {{ $category_with_highest_product->first()->name}}
          @endif
        </p>
        <p class="ml-5 font-semibold">
          Total Produk: {{ $category_with_highest_product->first()->crafts_count }}
        </p>
      </div>
      <div class="text-white text-md flex flex-col gap-1 text-lg mb-2">
        <div class="flex gap-3">
          <p class="text-xl">•</p>
          <p class="">Kategori dengan Produk Kerajinan Terendah:</p>
        </div>
        <p class="ml-5 font-semibold">
          @if ($category_with_lowest_product->count() > 1)
          {{ $category_with_lowest_product->first()->name }} (dan {{ $category_with_lowest_product->count()-1 }}
          kategori lainnya)
          @else
          {{ $category_with_lowest_product->first()->name}}
          @endif
        </p>
        <p class="ml-5 font-semibold">
          Total Produk: {{ $category_with_lowest_product->first()->crafts_count }}
        </p>
      </div>
    </div>
    {{-- Anggota Perajin --}}
    <div>
      <p class="text-2xl font-semibold mt-7 mb-5 w-fit mx-auto md:mx-0 text-white">Anggota Perajin</p>
      <div class="text-white text-md flex flex-col gap-1 text-lg mb-2">
        <div class="flex gap-3">
          <p class="text-xl">•</p>
          <p class="">Anggota Perajin dengan Produk Kerajinan Terbanyak:</p>
        </div>
        <p class="ml-5 font-semibold">
          @if ($craftsman_with_highest_product->count() > 1)
          {{ $craftsman_with_highest_product->first()->name }} (dan {{ $craftsman_with_highest_product->count()-1 }}
          perajin lainnya)
          @else
          {{ $craftsman_with_highest_product->first()->name}}
          @endif
        </p>
        <p class="ml-5 font-semibold">
          Total Produk: {{ $craftsman_with_highest_product->first()->crafts_count }}
        </p>
      </div>
      <div class="text-white text-md flex flex-col gap-1 text-lg mb-2">
        <div class="flex gap-3">
          <p class="text-xl">•</p>
          <p class="">Anggota Perajin dengan Produk Kerajinan Terendah:</p>
        </div>
        <p class="ml-5 font-semibold">
          @if ($craftsman_with_lowest_product->count() > 1)
          {{ $craftsman_with_lowest_product->first()->name }} (dan {{ $craftsman_with_lowest_product->count()-1 }}
          perajin lainnya)
          @else
          {{ $craftsman_with_lowest_product->first()->name}}
          @endif
        </p>
        <p class="ml-5 font-semibold">
          Total Produk: {{ $craftsman_with_lowest_product->first()->crafts_count }}
        </p>
      </div>
    </div>
    {{--Harga Produk Kerajinan --}}
    <div>
      <p class="text-2xl font-semibold mt-7 mb-5 w-fit mx-auto md:mx-0 text-white">Harga Produk Kerajinan</p>
      <div class="text-white text-md flex flex-col gap-1 text-lg mb-2">
        <div class="flex gap-3">
          <p class="text-xl">•</p>
          <p class="">Produk Kerajinan Termahal:</p>
        </div>
        <p class="ml-5 font-semibold">
          @if ($expensive_product->count() > 1)
          {{ $expensive_product->first()->title }} (dan {{ $expensive_product->count()-1 }}
          produk lainnya)
          @else
          {{ $expensive_product->first()->title}}
          @endif
        </p>
        <p class="ml-5 font-semibold">
          Oleh: {{ $expensive_product->first()->craftsman->name }}
        </p>
        <p class="ml-5 font-semibold">
          Harga: Rp{{ $expensive_product->first()->price}}
        </p>
      </div>
      <div class="text-white text-md flex flex-col gap-1 text-lg mb-2">
        <div class="flex gap-3">
          <p class="text-xl">•</p>
          <p class="">Produk Kerajinan Termurah:</p>
        </div>
        <p class="ml-5 font-semibold">
          @if ($cheap_product->count() > 1)
          {{ $cheap_product->first()->title }} (dan {{ $cheap_product->count()-1 }}
          produk lainnya)
          @else
          {{ $cheap_product->first()->title}}
          @endif
        </p>
        <p class="ml-5 font-semibold">
          Oleh: {{ $cheap_product->first()->craftsman->name }}
        </p>
        <p class="ml-5 font-semibold">
          Harga: Rp{{ $cheap_product->first()->price}}
        </p>
      </div>
    </div>
    {{--Pengunjung Produk Kerajinan --}}
    <div>
      <p class="text-2xl font-semibold mt-7 mb-5 w-fit mx-auto md:mx-0 text-white">Pengunjung Produk Kerajinan</p>
      <div class="text-white text-md flex flex-col gap-1 text-lg mb-2">
        <div class="flex gap-3">
          <p class="text-xl">•</p>
          <p class="">Produk Kerajinan dengan Pengunjung Terbanyak:</p>
        </div>
        <p class="ml-5 font-semibold">
          @if ($most_viewed_product->count() > 1)
          {{ $most_viewed_product->first()->title }} (dan {{ $most_viewed_product->count()-1 }}
          produk lainnya)
          @else
          {{ $most_viewed_product->first()->title}}
          @endif
        </p>
        <p class="ml-5 font-semibold">
          Oleh: {{ $most_viewed_product->first()->craftsman->name }}
        </p>
        <p class="ml-5 font-semibold">
          Jumlah Pengunjung: {{ $most_viewed_product->first()->views}}
        </p>
      </div>
      <div class="text-white text-md flex flex-col gap-1 text-lg mb-2">
        <div class="flex gap-3">
          <p class="text-xl">•</p>
          <p class="">Produk Kerajinan dengan Pengunjung Terendah:</p>
        </div>
        <p class="ml-5 font-semibold">
          @if ($less_viewed_product->count() > 1)
          {{ $less_viewed_product->first()->title }} (dan {{ $less_viewed_product->count()-1 }}
          produk lainnya)
          @else
          {{ $less_viewed_product->first()->title}}
          @endif
        </p>
        <p class="ml-5 font-semibold">
          Oleh: {{ $less_viewed_product->first()->craftsman->name }}
        </p>
        <p class="ml-5 font-semibold">
          Jumlah Pengunjung: {{ $less_viewed_product->first()->views}}
        </p>
      </div>
    </div>
  </div>
</div>
@endsection