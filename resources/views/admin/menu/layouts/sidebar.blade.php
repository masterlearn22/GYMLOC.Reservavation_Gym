<aside class="my-2 bg-white sidenav navbar navbar-vertical navbar-expand-xs border-radius-lg fixed-start ms-2" id="sidenav-main">
  <div class="sidenav-header">
    <i class="top-0 p-3 cursor-pointer fas fa-times text-dark opacity-5 position-absolute end-0 d-none d-xl-none" aria-hidden="true" id="iconSidenav"></i>
    <a class="px-4 py-3 m-0 navbar-brand" href="#" target="_blank">
      <img src="../assets/img/logo-ct-dark.png" class="navbar-brand-img" width="26" height="26" alt="main_logo">
      <span class="text-sm ms-1 text-dark">Transaksi Basis Data</span>
    </a>
  </div>
  <hr class="mt-0 mb-2 horizontal dark">
  <div class="w-auto collapse navbar-collapse " id="sidenav-collapse-main">
    <ul class="navbar-nav">
      <li class="mt-3 nav-item">
        <h6 class="text-xs ps-4 ms-2 text-uppercase text-dark font-weight-bolder opacity-5">Dashboard Admin</h6>
      </li>
      <li class="nav-item">
        <a class="nav-link text-dark" href="{{ route('role.index') }}">
          <i class="material-symbols-rounded opacity-5">settings</i>
          <span class="nav-link-text ms-1">Role</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link text-dark" href="{{ route('user.index') }}">
          <i class="material-symbols-rounded opacity-5">people</i>
          <span class="nav-link-text ms-1">Users</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link text-dark" href="{{ route('menu.index') }}">
          <i class="material-symbols-rounded opacity-5">people</i>
          <span class="nav-link-text ms-1">Menu</span>
        </a>
      </li>
    </ul>
  </div>
</aside>