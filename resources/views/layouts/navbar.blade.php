<header class=" bg-[#DD5353] text-white top-0 left-0 w-full flex items-center fixed z-[9999]">
  <div class="container">
    <div class="flex items-center justify-between relative">
      <div class="flex items-center py-2 ml-10">
        <a class="W-full self-center hover:shadow-xl mr-2" href="/info">
          <img src={{ asset('img/kbb.svg')}} alt="KBB" class="w-14 h-14 m-auto" />
        </a>
        <a class="W-full self-center hover:shadow-xl" href="/info">
          <img src={{ asset('img/LogoDekranasda.jpg')}} alt="Dekranasda" class="w-14 h-14 rounded-full m-auto" />
        </a>
        <p class="md:text-3xl text-base font-semibold md:ml-5 ml-2">DEKRANASDA KBB</p>
      </div>
      <div class="flex items-center gap-3 ">
        <div
          class="dropdown {{ (Request::is('craft*') || Request::is('categories*') || Request::is('detail*') ) ? 'block' : 'hidden'}}">
          <label tabindex="0" class="btn m-1 text-white">Pilih Kategori Produk </label>
          <div tabindex="0"
            class="dropdown-content p-2 shadow bg-base-100 rounded-box h-60 w-56 overflow-auto flex flex-col">
            @if (isset($categories))
            @foreach ($categories as $category)
            <a class="p-2 hover:bg-black rounded-md" href="/categories/{{ $category->name }}">{{ $category->name }}</a>
            @endforeach
            @endif
          </div>
        </div>

        <a class="rounded-lg py-2 px-3 hover:bg-[#B73E3E] border-2 d-none d-md-block text-xl font-semibold {{ (Request::is('craft*') || Request::is('categories*') || Request::is('detail*') ) ? 'hidden' : 'block'}}"
          href="/crafts">
          Produk Kami
        </a>
        @auth
        {{-- Bootstrap --}}
        {{-- <div class="btn-group d-none d-md-block">
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
        </div> --}}
        <div class="dropdown dropdown-end">
          <label tabindex="0" class="btn btn-ghost btn-circle avatar">
            <div class="w-20 rounded-full">
              <img src="{{ asset('storage/'. auth()->user()->profile_picture ) }}" />
            </div>
          </label>
          <ul tabindex="0"
            class="mt-3 p-2 shadow menu menu-compact dropdown-content bg-white text-black rounded-box w-52">
            <li><a class="text-xl" href="/dashboard">Dasbor Saya</a></li>
            <li>
              <form action="/logout" method="post">
                @csrf
                <button class="text-xl" type="submit">Keluar</button>
              </form>
            </li>
          </ul>
        </div>
        @else
        <a class="rounded-lg py-2 px-3 hover:bg-[#B73E3E] border-2 d-none d-md-block text-xl font-semibold"
          href="/login">
          Masuk
        </a>
        <a class="rounded-lg py-2 px-3 hover:bg-[#B73E3E] border-2 mr- d-none d-md-block text-xl font-semibold"
          href="/register">
          Daftar
        </a>
        @endauth

        {{-- Offcanvas bootstrap--}}

        {{-- <a class="text-5xl" data-bs-toggle="offcanvas" data-bs-target="#offcanvasWithBothOptions"
          aria-controls="offcanvasWithBothOptions" role="button">
          <i class="bi bi-list"></i>
        </a>
        <div class="offcanvas offcanvas-top md:px-16 bg-[#DD5353]" data-bs-scroll="true" tabindex="1"
          id="offcanvasWithBothOptions" aria-labelledby="offcanvasWithBothOptionsLabel">
          <div class="offcanvas-header">
            <h5 class="offcanvas-title text-2xl " id="offcanvasWithBothOptionsLabel">DEKRANASDA KBB</h5>
            <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
          </div>
          <div class="offcanvas-body">
            <div class="flex flex-col md:flex-row text-base md:text-2xl gap-3">
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
              <a class="rounded-lg py-2 px-3 hover:bg-[#B73E3E] border-2 d-block d-md-none font-semibold" href="/login">
                Masuk
              </a>
              <a class="rounded-lg  py-2 px-3 hover:bg-[#B73E3E] border-2 d-block d-md-none font-semibold"
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
              <a class="hover:text-[#B73E3E] md:mr-3" href="/articles">
                Artikel
              </a>
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
              <a class="hover:text-[#B73E3E]" href="/contact">
                Kontak
              </a>
            </div>
          </div>
        </div> --}}

        {{-- Drawer sidebar--}}
        <label for="my-drawer" class="btn drawer-button text-white bg-transparent border-0 hover:bg-[#B73E3E]">
          <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
            class="inline-block w-10 h-10 stroke-current">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
          </svg>
        </label>
      </div>
    </div>
  </div>
</header>