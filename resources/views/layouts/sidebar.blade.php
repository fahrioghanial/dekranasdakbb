<div class="font-medium text-xl mb-5">DEKRANASDA KBB</div>
@auth
@else
<a class="hover:bg-[#FF9684] font-medium text-xl p-4 lg:hidden block" href="/login">
  Masuk
</a>
<div class="border-2 my-2 border-white opacity-50 lg:hidden block"></div>
@endauth
<a class="hover:bg-[#FF9684] font-medium text-xl p-4" href="/crafts">
  Produk Kerajinan
</a>
<a class="hover:bg-[#FF9684] font-medium text-xl p-4" href="/member">
  Anggota Perajin
</a>
<a class="hover:bg-[#FF9684] font-medium text-xl p-4" href="/aboutus">
  Tentang Kami
</a>
{{-- <div class="collapse collapse-arrow hover:bg-[#FF9684]">
  <input type="checkbox" />
  <div class="collapse-title text-xl font-medium">
    Anggota Perajin
  </div>
  <div class="collapse-content flex flex-col font-medium">
    <a class="hover:bg-red-800" href="/member"><i class="bi bi-dot"></i> Anggota Kami</a>
    <a class="hover:bg-red-800" href="/benefit"><i class="bi bi-dot"></i> Keuntungan Menjadi
      Anggota</a>
    <a class="hover:bg-red-800" href="/howto"><i class="bi bi-dot"></i> Tata Cara Menjadi Anggota</a>
  </div>
</div> --}}
{{-- <div class="collapse collapse-arrow hover:bg-[#FF9684]">
  <input type="checkbox" />
  <div class="collapse-title text-xl font-medium ">
    Tentang Kami
  </div>
  <div class="collapse-content flex flex-col font-medium">
    <a class="hover:bg-red-800" href="/aboutus"><i class="bi bi-dot"></i> Profil</a>
    <a class="hover:bg-red-800" href="/organization"><i class="bi bi-dot"></i> Struktur
      Organisasi</a>
  </div>
</div> --}}
<a class="hover:bg-[#FF9684] font-medium text-xl p-4" href="/articles">
  Artikel
</a>
<a class="hover:bg-[#FF9684] font-medium text-xl p-4" href="/contact">
  Kontak
</a>