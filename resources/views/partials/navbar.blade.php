<nav class="navbar navbar-expand-lg text-light bg-primary">
    <div class="container-fluid">
        <div class="container">
            <a class="navbar-brand" href="/">
                <img src="/img/sicepot.png" alt="" height="50px">
            </a>
        </div>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link {{ $active === 'home' ? 'active' : '' }}" aria-current="page"
                        style="color: white" href="/">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ $active === 'daftar_mitra' ? 'active' : '' }}" style="color: white"
                        href="/daftar_mitra">Daftar Mitra</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ $active === 'daftar_kegiatan' ? 'active' : '' }}" style="color: white"
                        href="/daftar_kegiatan">Daftar Kegiatan</a>
                </li>
                @can('admin')
                    <li class="nav-item">
                        <a class="nav-link" style="color: white" href="/dashboard">Dashboard</a>
                    </li>
                @endcan

                <li class="nav-item">
                    <a class="nav-link" style="color: white" href="/logout">Logout</a>
                </li>
            </ul>
        </div>
    </div>
</nav>