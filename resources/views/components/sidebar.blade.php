<aside class="sidebar-left border-right bg-white shadow" id="leftSidebar" data-simplebar>
    <a href="#" class="btn collapseSidebar toggle-btn d-lg-none text-muted ml-2 mt-3" data-toggle="toggle">
        <i class="fe fe-x"><span class="sr-only"></span></i>
    </a>
    <nav class="vertnav navbar navbar-light">
        <!-- nav bar -->
        <div class="d-flex justify-content-center w-100">
            <div class="mt-4 mb-5">
                <img width="35" src="{{ asset('image/auth/twemoji_letter-w.png') }}" alt="">
            </div>
        </div>
        <ul class="navbar-nav flex-fill w-100 mb-2">
            <li class="nav-item w-100">
                <a class="nav-link" href="{{ route('home') }}">
                    <i class="fe fe-home fe-16"></i>
                    <span class="ml-3 item-text">Beranda</span>
                </a>
            </li>
            <li class="nav-item w-100">
                <a class="nav-link" href="{{ route('indexSettingHome') }}">
                    <i class="fe fe-archive fe-16"></i>
                    <span class="ml-3 item-text">Manajemen Berita</span>
                </a>
            </li>
            <li class="nav-item w-100">
                <a class="nav-link" href="{{ route('indexFactor') }}">
                    <i class="fe fe-feather fe-16"></i>
                    <span class="ml-3 item-text">Manajemen Faktor</span>
                </a>
            </li>
            <li class="nav-item w-100">
                <a class="nav-link" href="{{ route('indexImpact') }}">
                    <i class="fe fe-sun fe-16"></i>
                    <span class="ml-3 item-text">Manajemen Dampak</span>
                </a>
            </li>
            <li class="nav-item w-100">
                <a class="nav-link" href="{{ route('indexMitigation') }}">
                    <i class="fe fe-shield-off fe-16"></i>
                    <span class="ml-3 item-text">Manajemen Mitigasi</span>
                </a>
            </li>
        </ul>
        <p class="text-muted nav-heading mt-2 mb-1">
            <span>Sosial</span>
        </p>
        <ul class="navbar-nav flex-fill w-100 mb-2">
            <li class="nav-item w-100">
                <a class="nav-link" href="{{ route('indexGrup') }}">
                    <i class="fe fe-users fe-16"></i>
                    <span class="ml-3 item-text">Grup</span>
                </a>
            </li>
            <li class="nav-item w-100">
                <a class="nav-link" href="{{ route('indexTugas') }}">
                    <i class="fe fe-file fe-16"></i>
                    <span class="ml-3 item-text">Tugas</span>
                </a>
            </li>
            <li class="nav-item w-100">
                <a class="nav-link" href="{{ route('indexPoint') }}">
                    <i class="fe fe-grid fe-16"></i>
                    <span class="ml-3 item-text">My Point</span>
                </a>
            </li>
        </ul>
        <p class="text-muted nav-heading mt-2 mb-1">
            <span>Edukasi</span>
        </p>
        <ul class="navbar-nav flex-fill w-100 mb-2">
            <li class="nav-item w-100">
                <a class="nav-link" href="{{ route('indexEbook') }}">
                    <i class="fe fe-book fe-16"></i>
                    <span class="ml-3 item-text">E-Book</span>
                </a>
            </li>
        </ul>
        <p class="text-muted nav-heading mt-2 mb-1">
            <span>Pengaturan Edukasi</span>
        </p>
        <ul class="navbar-nav flex-fill w-100 mb-2">
            <li class="nav-item w-100">
                <a class="nav-link" href="{{ route('indexSettingEbook') }}">
                    <i class="fe fe-user fe-16"></i>
                    <span class="ml-3 item-text">Manajemen E-Book</span>
                </a>
            </li>
        </ul>
        <p class="text-muted nav-heading mt-2 mb-1">
            <span>Akun</span>
        </p>
        <ul class="navbar-nav flex-fill w-100 mb-2">
            <li class="nav-item w-100">
                <a class="nav-link" href="{{ route('indexProfil') }}">
                    <i class="fe fe-user fe-16"></i>
                    <span class="ml-3 item-text">Profil</span>
                </a>
            </li>
        </ul>
        <p class="text-muted nav-heading mt-2 mb-1">
            <span>Pengaturan Akun</span>
        </p>
        <ul class="navbar-nav flex-fill w-100 mb-2">
            <li class="nav-item w-100">
                <a class="nav-link" href="{{ route('indexUser') }}">
                    <i class="fe fe-user fe-16"></i>
                    <span class="ml-3 item-text">Manajemen User</span>
                </a>
            </li>
        </ul>
        <div class="btn-box w-100 mt-4 mb-1">
            <a href="/" target="_blank" class="btn mb-2 btn-primary btn-lg btn-block">
                <i class="fe fe-phone fe-12 mx-2"></i><span class="small">Hubungi Kami</span>
            </a>
        </div>
    </nav>
</aside>
