<header class="p-3 bg-dark text-white">
  <div class="container">
    <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start">
      <a href="/" class="d-flex align-items-center mb-2 mb-lg-0 mx-3 text-white text-decoration-none">
        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-box2"
          viewBox="0 0 16 16">
          <path
            d="M2.95.4a1 1 0 0 1 .8-.4h8.5a1 1 0 0 1 .8.4l2.85 3.8a.5.5 0 0 1 .1.3V15a1 1 0 0 1-1 1H1a1 1 0 0 1-1-1V4.5a.5.5 0 0 1 .1-.3L2.95.4ZM7.5 1H3.75L1.5 4h6V1Zm1 0v3h6l-2.25-3H8.5ZM15 5H1v10h14V5Z" />
        </svg>
      </a>

      <ul class="nav col-12 col-lg-auto me-lg-auto mb-2 justify-content-center mb-md-0">
        <li><a href="#" class="nav-link px-2 text-white">Produk</a></li>
      </ul>

      <form class="col-12 col-lg-auto mb-3 mb-lg-0 me-lg-3">
        <input type="search" class="form-control form-control-dark" placeholder="Cari Produk" aria-label="Search">
      </form>

      @auth

      <div class="btn-group">
        <button type="button" class="btn btn-danger dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
          Selamat datang, {{ auth()->user()->name }}
        </button>
        <ul class="dropdown-menu">
          <li><a class="dropdown-item" href="/dashboard">Kerajinan Saya</a></li>
          <li><a class="dropdown-item" href="#">Edit Informasi Pribadi</a></li>
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
      <div class="text-end">
        <a href="/login" class="btn btn-outline-light me-2">Masuk</a>
        <a href="/register" class="btn btn-warning">Daftar</a>
      </div>
      @endauth
    </div>
  </div>
</header>