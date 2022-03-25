<header class="topbar" data-navbarbg="skin6">
    <nav class="navbar top-navbar navbar-expand-md navbar-light">
        <div class="navbar-header" data-logobg="skin5">
            <a class="nav-toggler waves-effect waves-light d-block d-md-none" href="javascript:void(0)">
                <i class="ti-menu ti-close"></i>
            </a>
            <div class="navbar-brand">
                <a href="index.html" class="logo">
                    <span class="logo-text">
                        <h4 class="m-3 d-inline text-light dark-logo" style="font-family: 'Noto Sans', sans-serif;" >Warehouse <sup style="font-size: 12px; color:	#8a8583 ">The Crew</sup> </h5>
                    </span>
                </a>
            </div>
        </div>
        <div class="navbar-collapse collapse" id="navbarSupportedContent" data-navbarbg="skin6">
            <ul class="navbar-nav float-start me-auto"></ul>
            <ul class="navbar-nav float-end">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle text-muted waves-effect waves-dark pro-pic" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        @if (Auth::user()->foto_profil)
                            <img src="{{ Storage::url(Auth::user()->foto_profil)  }}" alt="Foto profil {{ Auth::user()->nama }}" class="rounded-circle" width="31" height="31" >
                        @else
                            <img src="{{ Storage::url('foto-profil/user.png')  }}" alt="Foto profil {{ Auth::user()->nama }}" class="rounded-circle" width="31" height="31"  >
                        @endif
                    </a>
                    <ul class="dropdown-menu dropdown-menu-end user-dd animated" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="/profil"><i class="ti-user me-1 ms-1"></i>
                            My Profile</a>
                        <form method="post" action="/logout">
                        @csrf
                        <button class="dropdown-item" type="submit"><i class="ti-angle-double-right me-1 ms-1"></i>
                            Logout</a>
                        </form>
                    </ul>
                </li>
            </ul>
        </div>
    </nav>
</header>
