<header class=" bg-[#DD5353] text-white top-0 left-0 w-full flex items-center fixed z-[9999]">
  <div class="container">
    <div class="flex items-center justify-between relative">
      <div class="flex items-center py-2 md:ml-10">
        <a class="W-full self-center hover:shadow-xl mr-2" href="/">
          <img src={{ asset('img/kbb.svg')}} alt="KBB" class="w-14 m-auto" />
        </a>
        <a class="W-full self-center hover:shadow-xl" href="/">
          <img src={{ asset('img/LogoDekranasda.jpg')}} alt="Dekranasda" class="w-14 rounded-full m-auto" />
        </a>
        <p class="md:text-3xl text-base font-semibold md:ml-5 ml-2 md:block hidden">DEKRANASDA KBB</p>
      </div>
      <div class="flex items-center gap-3 ">
        <div
          class="dropdown {{ (Request::is('craft*') || Request::is('categories*') || Request::is('detail*') ) ? 'block' : 'hidden'}}">
          <label tabindex="0" class="btn m-1 text-white">Pilih Kategori Produk </label>
          <div tabindex="0"
            class="dropdown-content p-2 shadow bg-base-100 rounded-box h-60 w-56 overflow-auto flex flex-col">
            <a class="p-2 hover:bg-black rounded-md" href="/crafts">Tampilkan Semua Produk</a>
            @if (isset($categories))
            @foreach ($categories as $category)
            <a class="p-2 hover:bg-black rounded-md" href="/crafts?category={{ $category->slug }}">{{ $category->name
              }}</a>
            @endforeach
            @endif
          </div>
        </div>

        <a class="rounded-lg py-2 px-3 hover:bg-[#B73E3E] border-2 text-xl font-semibold {{ (Request::is('craft*') || Request::is('categories*') || Request::is('detail*') ) ? 'hidden' : 'block'}} md:block hidden"
          href="/crafts">
          Produk Kami
        </a>
        @auth
        <div class="dropdown dropdown-end">
          <label tabindex="0" class="btn btn-ghost btn-circle avatar">
            <div class="w-20 rounded-full">
              <img src="{{ asset('storage/'. auth()->user()->profile_picture ) }}" />
            </div>
          </label>
          <ul tabindex="0"
            class="mt-3 p-2 shadow menu menu-compact dropdown-content bg-white text-black rounded-box w-52 ">
            <li><a class="text-xl hover:bg-[#DD5353] hover:text-white" href="/dashboard/user">Dasbor
                Saya</a>
            </li>
            <li>
              <form action="/logout" method="post" class="hover:bg-[#DD5353]  hover:text-white">
                @csrf
                <button class="text-xl" type="submit">Keluar</button>
              </form>
            </li>
          </ul>
        </div>
        @else
        <a class="rounded-lg py-2 px-3 hover:bg-[#B73E3E] border-2 text-xl font-semibold" href="/login">
          Masuk
        </a>
        <a class="rounded-lg py-2 px-3 hover:bg-[#B73E3E] border-2 text-xl font-semibold" href="/register">
          Daftar
        </a>
        @endauth
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