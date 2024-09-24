<style>
    .navbar{
        background:linear-gradient(135deg, #9796f0, #fbc7d4);
        font-family:'Source Sans Pro', sans-serif;
    }
    .navbar .text {
        background:transparent;
        padding-top:.75rem;
        padding-bottom:.75rem;
        color:#fff;
        border-radius:0;
        box-shadow:none;
        border:none;
    }
    .navbar .text:hover{
        color: #A459D1;
    }
    .navbar .login{
        font-weight: bold;
        color: #27374D;
    }
</style>

<nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
    <div class="container">
        <a href="{{ route('show.bimbingan') }}" class="navbar-brand d-flex align-items-center">
            <img src="http://localhost:8000/assets/img/logoup.png" alt="Logo UP" width="35" height="35" class="me-2">
            <strong>HelpDesk UP</strong>
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">

            <!-- Right Side Of Navbar -->
            <ul class="navbar-nav">
                <!-- Authentication Links -->
                @guest
                <li class="nav-item">
                    <a class="text nav-link {{ request()->routeIs('show.bimbingan') ? 'active':'' }}" aria-current="page" href="{{ route('show.bimbingan') }}">Bimbingan</a>
                </li>
                <li class="nav-item">
                    <a class="text nav-link mx-2 {{ request()->routeIs('show.tugas') ? 'active':'' }}" href="{{ route('show.tugas') }}">Tugas</a>
                </li>
                <li class="nav-item">
                    <a class="text nav-link {{ request()->routeIs('show.kuliah') ? 'active':'' }}" href="{{ route('show.kuliah') }}">Matakuliah</a>
                </li>
            </ul>
            <ul class="navbar-nav ms-auto">
                @if (Route::has('login'))
                <li class="nav-item ms-2">
                    <a class="login nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                </li>
                @endif
                @if (Route::has('register'))
                <li class="nav-item ms-2">
                    <a class="login nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                </li>
                @endif

                @else
                <li class="nav-item">
                    <a class="text nav-link {{ request()->routeIs('show.bimbingan') ? 'active':'' }}" aria-current="page" href="{{ route('show.bimbingan') }}">Bimbingan</a>
                </li>
                <li class="nav-item">
                    <a class="text nav-link mx-2 {{ request()->routeIs('show.tugas') ? 'active':'' }}" href="{{ route('show.tugas') }}">Tugas</a>
                </li>
                <li class="nav-item">
                    <a class="text nav-link {{ request()->routeIs('show.kuliah') ? 'active':'' }}" href="{{ route('show.kuliah') }}">Matakuliah</a>
                </li>
            </ul>
            <ul class="navbar-nav ms-auto">
                <li class="nav-item dropdown">
                    <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                        {{ Auth::user()->name }}
                    </a>

                    <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="{{ route('home') }}">Kegiatan</a>
                        <a class="dropdown-item" href="{{ route('edit.profile') }}">Edit Profile</a>
                        <a class="dropdown-item" href="{{ route('edit.password') }}">Reset Password</a>

                        @if(Auth()->user()->role == "admin")
                        <a class="dropdown-item" href="{{ route('index') }}">Halaman Admin</a>
                        @endif

                        <a class="dropdown-item" href="{{ route('logout') }}"
                        onclick="event.preventDefault();
                        document.getElementById('logout-form').submit();">
                        {{ __('Logout') }}</a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                    </li>
                </div>
            </ul>
            @endguest
        </div>
    </div>
</nav>
