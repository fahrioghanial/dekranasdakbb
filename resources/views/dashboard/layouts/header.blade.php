<div class="navbar bg-gray-900 justify-end text-white fixed z-40">
  <div class="flex gap-4">
    <div>
      Dasbor {{auth()->user()->name}}
    </div>
    <div class="dropdown dropdown-end">
      <label tabindex="0" class="btn btn-ghost btn-circle avatar">
        <div class="w-28 rounded-full">
          <img src="{{ asset('storage/'. auth()->user()->profile_picture ) }}" />
        </div>
      </label>
      <ul tabindex="0" class="mt-3 p-2 shadow menu menu-compact dropdown-content bg-gray-900 rounded-box w-52">
        <li><a class="text-md hover:bg-blue-600 " href="/">Kembali ke Halaman Utama</a></li>
        <li>
          <form action="/logout" method="post" class="hover:bg-blue-600 ">
            @csrf
            <button class="text-md" type="submit">Keluar</button>
          </form>
        </li>
      </ul>
    </div>
  </div>
</div>