<div class="container">
    <nav class="navbar navbar-expand-lg bg-body-tertiary">
        <div class="container-fluid">
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link btn btn-light {{ request()->routeIs('active.guid') ? 'active':'' }}" aria-current="page" href="{{ route('active.guid') }}">Bimbingan</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link btn btn-light {{ request()->routeIs('active.coll') ? 'active':'' }}" href="{{ route('active.coll') }}">Tugas</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
</div>
