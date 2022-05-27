<header class="navbar navbar-dark sticky-top bg-dark flex-md-nowrap p-0 shadow">
  <a class="navbar-brand col-md-3 col-lg-2 me-0 px-3" href="/dashboard">DASBOR</a>
  <button class="navbar-toggler position-absolute d-md-none collapsed" type="button" data-bs-toggle="collapse"
    data-bs-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  {{-- <input class="form-control form-control-dark w-100" type="text" placeholder="Search" aria-label="Search"> --}}
  <div class="btn-group mx-4">
    <button type="button" class="btn btn-danger dropdown-toggle my-3 mx-auto" data-bs-toggle="dropdown"
      aria-expanded="false">
      Selamat datang, {{ auth()->user()->name }}
    </button>
    <ul class="dropdown-menu">
      <li><a class="dropdown-item" href="/crafts">Kembali Ke Daftar Produk</a></li>
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
</header>