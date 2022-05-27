<header class=" bg-[#dc3545] text-white top-0 left-0 w-full flex items-center font-asap fixed z-[9999]">
  <div class="container">
    <div class="flex items-center justify-between relative">
      <div class="flex items-center py-2">
        <a class="W-full self-center hover:shadow-xl mr-2" href="/">
          <img src={{ asset('img/kbb.svg')}} alt="KBB" class="w-14 h-14 m-auto" />
        </a>
        <a class="W-full self-center hover:shadow-xl" href="/">
          <img src={{ asset('img/LogoDekranasda.jpg')}} alt="Dekranasda" class="w-14 h-14 rounded-full m-auto" />
        </a>
        <p class="md:text-3xl text-base font-semibold md:ml-5 ml-2">DEKRANASDA KBB</p>
      </div>
      <div class="flex items-center gap-3 ">
        <button
          class="rounded-lg py-2 px-3 hover:bg-red-200 bg-red-50 text-[#dc3545] d-none d-md-block text-xl font-semibold"
          data-bs-toggle="offcanvas" data-bs-target="#offcanvasExample" aria-controls="offcanvasExample">
          Pilih Kategori Produk
        </button>
        <div class="offcanvas offcanvas-start text-black" tabindex="-1" id="offcanvasExample"
          aria-labelledby="offcanvasExampleLabel">
          <div class="offcanvas-header">
            <h5 class="offcanvas-title" id="offcanvasExampleLabel">Kategori Produk</h5>
            <button type="button" class="btn-close text-reset text-black text-3xl" data-bs-dismiss="offcanvas"
              aria-label="Close">
              <i class="bi bi-x-lg"></i>
            </button>
          </div>
          <a class="rounded-lg text-white bg-blue-600 md:text-xl py-2 px-3 hover:bg-blue-800 w-fit mx-auto"
            href="/crafts">Tampilkan Semua Produk</a>
          <div class="offcanvas-body">
            @foreach($categories as $category)
            <a class="btn btn-primary mt-2" href="/categories/{{ $category->slug }}">{{ $category->name }}</a>
            @endforeach
          </div>
        </div>
        @auth
        <div class="btn-group d-none d-md-block">
          <button type="button" class="text-md font-bold bg-blue-600 text-white py-2 px-3 rounded-lg dropdown-toggle"
            data-bs-toggle="dropdown" aria-expanded="false">
            Selamat datang, {{ auth()->user()->name }}
          </button>
          <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="/dashboard">Dasbor Saya</a></li>
            <li>
              <hr class="dropdown-divider">
            </li>
            <li>
              <form action="/logout" method="post">
                @csrf
                <button type="submit" class="dropdown-item">Keluar</button>
              </form>
            </li>
          </ul>
        </div>
        @else
        <a class="rounded-lg py-2 px-3 hover:bg-red-300 border-2 d-none d-md-block text-xl font-semibold" href="/login">
          Masuk
        </a>
        <a class="rounded-lg  py-2 px-3 hover:bg-red-300 border-2 mr-3 d-none d-md-block text-xl font-semibold"
          href="/register">
          Daftar
        </a>
        @endauth

        {{-- Offcanvas --}}

        <a class="text-5xl" data-bs-toggle="offcanvas" data-bs-target="#offcanvasWithBothOptions"
          aria-controls="offcanvasWithBothOptions" role="button">
          <i class="bi bi-list"></i>
        </a>
        <div class="offcanvas offcanvas-top md:px-16 bg-[#dc3545]" data-bs-scroll="true" tabindex="1"
          id="offcanvasWithBothOptions" aria-labelledby="offcanvasWithBothOptionsLabel">
          <div class="offcanvas-header">
            <h5 class="offcanvas-title text-2xl " id="offcanvasWithBothOptionsLabel">DEKRANASDA KBB</h5>
            <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
          </div>
          <div class="offcanvas-body">
            <div class="flex flex-col md:flex-row text-base md:text-2xl gap-3">
              <button
                class="rounded-lg py-2 px-3 hover:bg-red-200 bg-red-50 text-[#dc3545] d-block d-md-none text-xl font-semibold"
                data-bs-toggle="offcanvas" data-bs-target="#offcanvasExample" aria-controls="offcanvasExample">
                Pilih Kategori Produk
              </button>
              <div class="offcanvas offcanvas-start text-black" tabindex="-1" id="offcanvasExample"
                aria-labelledby="offcanvasExampleLabel">
                <div class="offcanvas-header">
                  <h5 class="offcanvas-title" id="offcanvasExampleLabel">Kategori Produk</h5>
                  <button type="button" class="btn-close text-reset text-black text-3xl" data-bs-dismiss="offcanvas"
                    aria-label="Close">
                    <i class="bi bi-x-lg"></i>
                  </button>
                </div>
                <div class="offcanvas-body">
                  <a class="rounded-lg text-white bg-blue-600 md:text-xl py-2 px-3 hover:bg-blue-800 w-fit mx-auto"
                    href="/crafts">Tampilkan Semua Produk</a>
                  @foreach($categories as $category)
                  <a class="btn btn-primary mt-2" href="/categories/{{ $category->slug }}">{{ $category->name }}</a>
                  @endforeach
                </div>
              </div>
              @auth
              <div class="btn-group d-block d-md-none">
                <button type="button" class="font-bold bg-blue-600 text-white py-2 px-3 rounded-lg dropdown-toggle"
                  data-bs-toggle="dropdown" aria-expanded="false">
                  Selamat datang, {{ auth()->user()->name }}
                </button>
                <ul class="dropdown-menu">
                  <li><a class="dropdown-item" href="/dashboard">Dasbor Saya</a></li>
                  <li>
                    <hr class="dropdown-divider">
                  </li>
                  <li>
                    <form action="/logout" method="post">
                      @csrf
                      <button type="submit" class="dropdown-item">Keluar</button>
                    </form>
                  </li>
                </ul>
              </div>
              @else
              <a class="rounded-lg py-2 px-3 hover:bg-red-300 border-2 d-block d-md-none font-semibold" href="/login">
                Masuk
              </a>
              <a class="rounded-lg  py-2 px-3 hover:bg-red-300 border-2 d-block d-md-none font-semibold"
                href="/register">
                Daftar
              </a>
              @endauth
              <div class="md:mr-3">
                <button data-bs-toggle="collapse" data-bs-target="#collapseExample1" aria-expanded="false"
                  aria-controls="collapseExample">
                  Perajin <i class="bi bi-caret-down-fill"></i>
                </button>
                <div class="collapse" id="collapseExample1">
                  <div class="flex flex-col gap-1 text-white ml-3">
                    <a href="/crafts"><i class="bi bi-dot"></i> Produk Kami</a>
                    <a href="/member"><i class="bi bi-dot"></i> Anggota Kami</a>
                    <a href="/benefit"><i class="bi bi-dot"></i> Keuntungan Menjadi Anggota</a>
                    <a href="/howto"><i class="bi bi-dot"></i> Tata Cara Menjadi Anggota</a>
                  </div>
                </div>
              </div>
              <div class="md:mr-3">
                <button data-bs-toggle="collapse" data-bs-target="#collapseExample2" aria-expanded="false"
                  aria-controls="collapseExample">
                  Berita & Kegiatan <i class="bi bi-caret-down-fill"></i>
                </button>
                <div class="collapse" id="collapseExample2">
                  <div class="flex flex-col gap-1 text-white ml-3">
                    <a href="#"><i class="bi bi-dot"></i> Berita Terkini</a>
                    <a href="#"><i class="bi bi-dot"></i> Calendar of Event</a>
                  </div>
                </div>
              </div>
              <div class="md:mr-3">
                <button data-bs-toggle="collapse" data-bs-target="#collapseExample3" aria-expanded="false"
                  aria-controls="collapseExample">
                  Tentang Kami <i class="bi bi-caret-down-fill"></i>
                </button>
                <div class="collapse" id="collapseExample3">
                  <div class="flex flex-col gap-1 text-white ml-3">
                    <a href="/aboutus"><i class="bi bi-dot"></i> Profil</a>
                    <a href="/organization"><i class="bi bi-dot"></i> Struktur Organisasi</a>
                  </div>
                </div>
              </div>
              <a class="hover:text-red-300" href="/contact">
                Kontak
              </a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</header>