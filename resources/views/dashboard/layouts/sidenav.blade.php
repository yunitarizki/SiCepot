<body>
    <nav class="navbar navbar-expand-lg fixed-top bg-primary">
        <div class="container-fluid">
          <img src="/img/sicepot.png" height="50px" class="float-left logo-fav">
          <h4 class="navbar-brand text-white">Badan Pusat Statistik Kab. Cilacap</h4>
          
            <div class="icon">
                <a class="float-right logout text-white" href="/logout">Logout
                    <div class="fa-solid fa-right-from-bracket ms-2 me-3">
                    </div>
                </a>

            </div>
          </div>
        </div>
      </nav>

      <div class="sidebar">
        <nav>
            <ul class="mt-5">
                <a href="/dashboard" style="text-decoration: none;">
                    <li>
                        <div>
                            {{-- <span class="fas fa-tachometer-alt"></span> --}}
                            <i class="fa-solid fa-house"></i>
                            <span>Dashboard</span>
                        </div>
                    </li>
                </a>

                <!-- data -->
                <a href="/dashboard/mitra/daftar" style="text-decoration: none;">
                <li>
                    <div>
                        {{-- <span class="fa-solid fa-user-group"></span> --}}
                        <i class="fa-solid fa-users"></i>
                        <span>Daftar Mitra</span>
                    </div>
                </li>
                </a>

                
                <a href="/dashboard/kegiatan/daftar" style="text-decoration: none;">
                <li class="klik2" id="flip2" style="cursor:pointer;">
                    <div>
                        <span class="fa-solid fa-briefcase"></span>
                        <span>Daftar Kegiatan</span>
                    </div>
                </li>
                </a>

                <a href="/dashboard/master_kegiatan/daftar" style="text-decoration: none;">
                <li class="klik2" id="flip2" style="cursor:pointer;">
                    <div>
                        <span class="fa-solid fa-laptop-file"></span>
                        <span>Master Kegiatan</span>
                    </div>
                </li>
                </a>

                <a href="/dashboard/masterlain/daftar" style="text-decoration: none;">
                    <li class="klik2" id="flip2" style="cursor:pointer;">
                        <div>
                            {{-- <span class="fa-solid fa-laptop-file"></span> --}}
                            <i class="fa-solid fa-book"></i>
                            <span>Master Lain</span>
                        </div>
                    </li>
                    </a>

                <a href="/dashboard/data_spk/daftar" style="text-decoration: none;">
                <li class="klik2" id="flip2" style="cursor:pointer;">
                    <div>
                        {{-- <span class="fa-solid fa-laptop-file"></span> --}}
                        <i class="fa-solid fa-calendar-check"></i>
                        <span>Data SPK</span>
                    </div>
                </li>
                </a>
                <a href="/dashboard/laporan/spj" style="text-decoration: none;">
                    <li class="klik2" id="flip2" style="cursor:pointer;">
                        <div>
                            {{-- <span class="fa-solid fa-laptop-file"></span> --}}
                            <i class="fa-solid fa-file-contract"></i>
                            <span>Laporan SPJ</span>
                        </div>
                    </li>
                    </a>

                
                {{-- <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle text-black" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="fas fa-clipboard-list me-2" id="flip2" style="cursor:pointer;"></i>Lampiran</a>
                        <ul class="dropdown-menu text-black">
                            <li><a class="dropdown-item text-black" href="/dashboard/laporan/lamp_spk"><i class="fa-solid fa-paperclip"></i>SPK</a></li>
                            <li><a class="dropdown-item text-black" href="/dashboard/laporan/bast"><i class="fa-solid fa-handshake"></i> BAST</a></li>
                        </ul>
                </li> --}}

                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle text-black" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        <i class="fas fa-clipboard-list me-2" id="flip2" style="cursor:pointer;"></i>
                        <span>Lampiran</span></a>
                    <ul class="dropdown-menu text-black">
                        <li><a class="dropdown-item text-black" href="/dashboard/laporan/lamp_spk"><i class="fa-solid fa-paperclip"></i>SPK</a></li>
                        <li><a class="dropdown-item text-black" href="/dashboard/laporan/bast"><i class="fa-solid fa-handshake"></i> BAST</a></li>
                    </ul>
            </li>
            </ul>
        </nav>
    </div>

    <script src="js/bootstrap.js"></script>

</body>