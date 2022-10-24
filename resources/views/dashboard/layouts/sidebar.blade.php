<span class="text-white text-4xl top-5 left-4 cursor-pointer z-50 fixed" onclick="openSidebar()">
  <i class="bi bi-filter-left px-2 bg-gray-900 rounded-md"></i>
</span>
<div class="sidebar fixed top-0 bottom-0 lg:left-0 p-2 w-[300px] overflow-y-auto text-center bg-gray-900 z-50">
  <div class="text-gray-100 text-xl">
    <div class="p-2.5 mt-1 flex items-center">
      <img src={{ asset('img/LogoDekranasda.jpg')}} class="w-10 rounded-full" alt="Dekranasda" />
      <h1 class="font-bold text-gray-200 text-[15px] ml-3">Dekranasda KBB</h1>
      <i class="bi bi-x cursor-pointer ml-28 lg:hidden" onclick="openSidebar()"></i>
    </div>
    <div class="my-2 bg-gray-600 h-[1px]"></div>
  </div>
  {{-- Profil Saya --}}
  <a href="/dashboard/user">
    <div
      class="{{ Request::is('dashboard/user*') ? 'bg-blue-600' : ''}} p-2.5 mt-3 flex items-center rounded-md px-4 duration-300 cursor-pointer hover:bg-blue-600 text-white">
      <i class="bi bi-person-circle"></i>
      <span class="text-[15px] ml-4 text-gray-200 font-bold">Profil Saya</span>
    </div>
  </a>
  {{-- Kerajinan Saya --}}
  @can('member')
  <a href="/dashboard/crafts">
    <div
      class="{{ (Request::is('dashboard/crafts*') && !Request::is('dashboard/craftsadmin')) ? 'bg-blue-600' : ''}} p-2.5 mt-3 flex items-center rounded-md px-4 duration-300 cursor-pointer hover:bg-blue-600 text-white">

      <i class="bi bi-handbag-fill"></i>
      <span class="text-[15px] ml-4 text-gray-200 font-bold">Produk Kerajinan Saya</span>
    </div>
  </a>
  @endcan

  {{-- Admin Section --}}
  @can('admin')
  <div class="my-4 bg-gray-600 h-[1px]"></div>
  <p class="text-white text-sm">ADMINISTRATOR</p>
  <a href="/dashboard/categories">
    <div
      class="{{ Request::is('dashboard/categories*') ? 'bg-blue-600' : ''}} p-2.5 mt-3 flex items-center rounded-md px-4 duration-300 cursor-pointer hover:bg-blue-600 text-white">
      <i class="bi bi-tags-fill"></i>
      <span class="text-[15px] ml-4 text-gray-200 font-bold">Kategori Produk</span>
    </div>
  </a>
  <a href="/dashboard/craftsadmin">
    <div
      class="{{ Request::is('dashboard/craftsadmin*') ? 'bg-blue-600' : ''}} p-2.5 mt-3 flex items-center rounded-md px-4 duration-300 cursor-pointer hover:bg-blue-600 text-white">
      <i class="bi bi-clipboard-check-fill"></i>
      <span class="text-[15px] ml-4 text-gray-200 font-bold">Data Produk Kerajinan</span>
    </div>
  </a>

  <a href="/dashboard/adminuser">
    <div
      class="{{ Request::is('dashboard/adminuser*') ? 'bg-blue-600' : ''}} p-2.5 mt-3 flex items-center rounded-md px-4 duration-300 cursor-pointer hover:bg-blue-600 text-white">
      <i class="bi bi-people-fill"></i>
      <span class="text-[15px] ml-4 text-gray-200 font-bold">Data Perajin</span>
    </div>
  </a>
  <a href="/dashboard/articles">
    <div
      class="{{ Request::is('dashboard/articles*') ? 'bg-blue-600' : ''}} p-2.5 mt-3 flex items-center rounded-md px-4 duration-300 cursor-pointer hover:bg-blue-600 text-white">
      <i class="bi bi-pencil-square"></i>
      <span class="text-[15px] ml-4 text-gray-200 font-bold">Artikel Saya</span>
    </div>
  </a>
  <a href="/dashboard/statistics">
    <div
      class="{{ Request::is('dashboard/statistics*') ? 'bg-blue-600' : ''}} p-2.5 mt-3 flex items-center rounded-md px-4 duration-300 cursor-pointer hover:bg-blue-600 text-white">
      <i class="bi bi-bar-chart-line-fill"></i>
      <span class="text-[15px] ml-4 text-gray-200 font-bold">Statistik</span>
    </div>
  </a>
  @endcan

  {{-- <div
    class="p-2.5 mt-3 flex items-center rounded-md px-4 duration-300 cursor-pointer hover:bg-blue-600 text-white"
    onclick="dropdown()">
    <i class="bi bi-chat-left-text-fill"></i>
    <div class="flex justify-between w-full items-center">
      <span class="text-[15px] ml-4 text-gray-200 font-bold">Chatbox</span>
      <span class="text-sm rotate-180" id="arrow">
        <i class="bi bi-chevron-down"></i>
      </span>
    </div>
  </div>
  <div class="text-left text-sm mt-2 w-4/5 mx-auto text-gray-200 font-bold" id="submenu">
    <h1 class="cursor-pointer p-2 hover:bg-blue-600 rounded-md mt-1">
      Social
    </h1>
    <h1 class="cursor-pointer p-2 hover:bg-blue-600 rounded-md mt-1">
      Personal
    </h1>
    <h1 class="cursor-pointer p-2 hover:bg-blue-600 rounded-md mt-1">
      Friends
    </h1>
  </div> --}}

</div>

<script type="text/javascript">
  // function dropdown() {
  //     document.querySelector("#submenu").classList.toggle("hidden");
  //     document.querySelector("#arrow").classList.toggle("rotate-0");
  //   }
  //   dropdown();

    function openSidebar() {
      document.querySelector(".sidebar").classList.toggle("hidden");
    }
</script>