<nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
  <div class="position-sticky pt-5">
    <ul class="nav flex-column">
      @can('member')
      <li class="nav-item">
        <a class="nav-link {{ (Request::is('dashboard/crafts*') && !Request::is('dashboard/craftsadmin')) ? 'active' : ''}}"
          href="/dashboard/crafts">
          <span data-feather="shopping-bag"></span>
          Kerajinan Saya
        </a>
      </li>
      @endcan
      <li class="nav-item">
        <a class="nav-link {{ Request::is('dashboard/user*') ? 'active' : ''}}" href="/dashboard/user">
          <span data-feather="user"></span>
          Profil Saya
        </a>
      </li>
    </ul>

    @can('admin')
    <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted">
      Administrator</h6>
    <ul class="nav flex-column">
      <li class="nav-item">
        <a class="nav-link {{ Request::is('dashboard/categories*') ? 'active' : ''}}" href="/dashboard/categories">
          <span data-feather="shopping-bag"></span>
          Kategori Produk
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link {{ Request::is('dashboard/craftsadmin*') ? 'active' : ''}}" href="/dashboard/craftsadmin">
          <span data-feather="check-circle"></span>
          Konfirmasi Kerajinan
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link {{ Request::is('dashboard/adminuser*') ? 'active' : ''}}" href="/dashboard/adminuser">
          <span data-feather="users"></span>
          Data Perajin
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link {{ Request::is('dashboard/articles*') ? 'active' : ''}}" href="/dashboard/articles">
          <span data-feather="book-open"></span>
          Artikel Saya
        </a>
      </li>
    </ul>
    @endcan
  </div>
</nav>