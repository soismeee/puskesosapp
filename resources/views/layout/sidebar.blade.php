<div class="topnav">
    <div class="container-fluid">
        <nav class="navbar navbar-light navbar-expand-lg topnav-menu">

            <div class="collapse navbar-collapse" id="topnav-menu-content">
                <ul class="navbar-nav">
                @guest  
                    <li class="nav-item dropdown">
                        <a class="nav-link arrow-none" href="/" id="topnav-dashboard" role="button" aria-haspopup="true" aria-expanded="false">
                            <span data-key="t-dashboards">Home</span>
                        </a>
                    </li>

                    <li class="nav-item dropdown">
                        <a class="nav-link arrow-none" href="/jenis-pelayanan" id="topnav-dashboard" role="button" aria-haspopup="true" aria-expanded="false">
                            <span data-key="t-dashboards">Jenis Pelayanan</span>
                        </a>
                    </li>

                    <li class="nav-item dropdown">
                        <a class="nav-link arrow-none" href="/jam-pelayanan" id="topnav-dashboard" role="button" aria-haspopup="true" aria-expanded="false">
                            <span data-key="t-dashboards">Jam Pelayanan</span>
                        </a>
                    </li>

                    <li class="nav-item dropdown">
                        <a class="nav-link arrow-none" href="/teknis-pengajuan" id="topnav-dashboard" role="button" aria-haspopup="true" aria-expanded="false">
                            <span data-key="t-dashboards">Teknis Pengajuan</span>
                        </a>
                    </li>

                    <li class="nav-item dropdown">
                        <a class="nav-link arrow-none" href="/cek-pengajuan" id="topnav-dashboard" role="button" aria-haspopup="true" aria-expanded="false">
                            <span data-key="t-dashboards">Cek Pengajuan</span>
                        </a>
                    </li>

                    @endguest

                    {{-- ########################################################################################################################## --}}
                    @auth
                    <li class="nav-item dropdown">
                        <a class="nav-link arrow-none" href="/home" id="topnav-dashboard" role="button" aria-haspopup="true" aria-expanded="false">
                            <span data-key="t-dashboards">Dashboard</span>
                        </a>
                    </li>
                    @endauth

                    {{-- ########################################################################################################################## --}}
                    @can('Admin')

                    <li class="nav-item dropdown">
                        <a class="nav-link arrow-none" href="/layanan" id="topnav-dashboard" role="button" aria-haspopup="true" aria-expanded="false">
                            <span data-key="t-layanan">Daftar Layanan</span>
                        </a>
                    </li>

                    <li class="nav-item dropdown">
                        <a class="nav-link arrow-none" href="/wilayah" id="topnav-dashboard" role="button" aria-haspopup="true" aria-expanded="false">
                            <span data-key="t-wilayah">Wilayah</span>
                        </a>
                    </li>

                    <li class="nav-item dropdown">
                        <a class="nav-link arrow-none" href="/pengajuan" id="topnav-dashboard" role="button" aria-haspopup="true" aria-expanded="false">
                            <span data-key="t-pengajuan">Daftar Pengajuan</span>
                        </a>
                    </li>
                    @endcan

                    {{-- ########################################################################################################################## --}}
                    @can('User')
                    <li class="nav-item dropdown">
                        <a class="nav-link arrow-none" href="/pengajuan" id="topnav-dashboard" role="button" aria-haspopup="true" aria-expanded="false">
                            <span data-key="t-pengajuan">Pengajuan</span>
                        </a>
                    </li>
                    
                    <li class="nav-item dropdown">
                        <a class="nav-link arrow-none" href="/pengajuan" id="topnav-dashboard" role="button" aria-haspopup="true" aria-expanded="false">
                            <span data-key="t-riwayat">Riwayat Pengajuan</span>
                        </a>
                    </li>
                    @endcan
                    
                    @auth
                    <li class="nav-item dropdown">
                        <a class="nav-link arrow-none" href="/pengajuan" id="topnav-dashboard" role="button" aria-haspopup="true" aria-expanded="false">
                            <span data-key="t-profil">Profil</span>
                        </a>
                    </li>
                    @endauth
                </ul>
            </div>
        </nav>
    </div>
</div>