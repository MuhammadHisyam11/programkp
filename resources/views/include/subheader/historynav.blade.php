
<div class="container">
    <nav class="navbar navbar-expand-lg bg-body-tertiary">
        <div class="container-fluid">
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link btn btn-light {{ request()->routeIs('history.guidance') ? 'active':'' }}" aria-current="page" href="{{ route('history.guidance') }}">History Bimbingan</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link btn btn-light {{ request()->routeIs('history.collection') ? 'active':'' }}" href="{{ route('history.collection') }}">History Tugas</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
</div>
