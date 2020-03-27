<div class="container d-flex flex-row nav-top">
  <div class="text-center navbar-brand-wrapper d-flex align-items-top">
    <a class="navbar-brand brand-logo" href="../../index.html">
      <img src="{{asset('asset')}}/assets/images/logo_2.svg" alt="logo" /> </a>
    <a class="navbar-brand brand-logo-mini" href="../../index.html">
      <img src="{{asset('asset')}}/assets/images/logo-mini.svg" alt="logo" /> </a>
  </div>
  <div class="navbar-menu-wrapper d-flex align-items-center">
    <ul class="navbar-nav ml-auto">
      <li class="nav-item dropdown d-none d-xl-inline-block user-dropdown">
        <a class="nav-link dropdown-toggle" id="UserDropdown" href="#" data-toggle="dropdown" aria-expanded="false">
          <div class="wrapper d-flex flex-column">
            <span class="profile-text">{{Auth::user()->name}}</span>
            <span class="user-designation">{{Auth::user()->username}}</span>
          </div>
          <div class="display-avatar bg-inverse-primary text-primary">AS</div>
        </a>
        <div class="dropdown-menu dropdown-menu-right navbar-dropdown" aria-labelledby="UserDropdown">
          <div class="dropdown-header text-center">
            <img class="img-md rounded-circle" src="{{asset('asset')}}/assets/images/faces/face1.jpg" alt="Profile image">
            <p class="mb-1 mt-3 font-weight-semibold">{{Auth::user()->name}}</p>
            <p class="font-weight-light text-muted mb-0">{{Auth::user()->username}}</p>
          </div>
          <a class="dropdown-item"><i class="dropdown-item-icon mdi mdi-account-outline text-primary"></i> Ganti Password</a>
          <a href="{{route('logout')}}" class="dropdown-item" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"><i class="dropdown-item-icon mdi mdi-power text-primary"></i>Keluar</a>
        </div>
      </li>
    </ul>
    <button class="navbar-toggler align-self-center" type="button" data-toggle="minimize">
      <span class="mdi mdi-menu"></span>
    </button>
  </div>
</div>
