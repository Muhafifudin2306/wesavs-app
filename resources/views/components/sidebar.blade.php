<aside class="sidebar-left border-right bg-white shadow" id="leftSidebar" data-simplebar>
    <a href="#" class="btn collapseSidebar toggle-btn d-lg-none text-muted ml-2 mt-3" data-toggle="toggle">
        <i class="fe fe-x"><span class="sr-only"></span></i>
    </a>
    <nav class="vertnav navbar navbar-light">
        <!-- nav bar -->
        <div class="d-flex justify-content-center w-100">
            <div class="mt-4 mb-5">
                <img width="75" src="{{ asset('image/auth/logo-wesavs.png') }}" alt="">
            </div>
        </div>
        <ul class="navbar-nav flex-fill w-100 mb-2">
            <li class="nav-item w-100">
                <a class="nav-link" href="{{ route('home') }}">
                    <i class="fe fe-home fe-16"></i>
                    <span class="ml-3 item-text">Beranda</span>
                </a>
            </li>
            @role('admin')
                <li class="nav-item w-100">
                    <a class="nav-link" href="{{ route('indexSettingLanding') }}">
                        <i class="fe fe-layout fe-16"></i>
                        <span class="ml-3 item-text">Manajemen Landing Page</span>
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
            @endrole
        </ul>
        <ul class="navbar-nav flex-fill w-100 mb-2">
            @role('user')
                <p class="text-muted nav-heading mt-2 mb-1">
                    <span>Sosial</span>
                </p>
                <li class="nav-item w-100">
                    <a class="nav-link" href="{{ route('indexGrup') }}">
                        <i class="fe fe-users fe-16"></i>
                        <span class="ml-3 item-text">Grup</span>
                    </a>
                </li>
                {{-- <li class="nav-item w-100">
                    <a class="nav-link" href="{{ route('indexTugas') }}">
                        <i class="fe fe-file fe-16"></i>
                        <span class="ml-3 item-text">Tugas</span>
                    </a>
                </li> --}}
                <li class="nav-item w-100">
                    <a class="nav-link" href="{{ route('indexPoint') }}">
                        <i class="fe fe-award fe-16"></i>
                        <span class="ml-3 item-text">My Point</span>
                    </a>
                </li>
                <li class="nav-item w-100">
                    <a class="nav-link" href="{{ route('indexUserOrder') }}">
                        <i class="fe fe-shopping-cart fe-16"></i>
                        <span class="ml-3 item-text">My Order</span>
                    </a>
                </li>
            @endrole
            @role('admin')
                <p class="text-muted nav-heading mt-2 mb-1">
                    <span>Sosial</span>
                </p>
                <li class="nav-item w-100">
                    <a class="nav-link" href="{{ route('indexSettingGrup') }}">
                        <i class="fe fe-users fe-16"></i>
                        <span class="ml-3 item-text">Manajemen Grup</span>
                    </a>
                </li>
                <li class="nav-item w-100">
                    <a class="nav-link" href="{{ route('indexSettingTugas') }}">
                        <i class="fe fe-file fe-16"></i>
                        <span class="ml-3 item-text">Manajemen Tugas</span>
                    </a>
                </li>
                <li class="nav-item w-100">
                    <a class="nav-link" href="{{ route('indexSettingGift') }}">
                        <i class="fe fe-archive fe-16"></i>
                        <span class="ml-3 item-text">Manajemen Hadiah</span>
                    </a>
                </li>
                <li class="nav-item w-100">
                    <a class="nav-link" href="{{ route('indexSettingOrder') }}">
                        <i class="fe fe-shopping-cart fe-16"></i>
                        <span class="ml-3 item-text">Pesanan Peserta</span>
                    </a>
                </li>
            @endrole
        </ul>
        @role('user')
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
        @endrole
        @role('user')
            <p class="text-muted nav-heading mt-2 mb-1">
                <span>Konsultasi</span>
            </p>
            <ul class="navbar-nav flex-fill w-100 mb-2">
                <li class="nav-item w-100">
                    <a class="nav-link" href="{{ route('indexPsikiater') }}">
                        <i class="fe fe-compass fe-16"></i>
                        <span class="ml-3 item-text">Layanan Konsultasi</span>
                    </a>
                </li>
            </ul>
            {{-- <ul class="navbar-nav flex-fill w-100 mb-2">
                <li class="nav-item w-100">
                    <a class="nav-link" href="{{ route('indexUserConsul') }}">
                        <i class="fe fe-tag fe-16"></i>
                        <span class="ml-3 item-text">Konsultasi Saya</span>
                    </a>
                </li>
            </ul> --}}
        @endrole
        @role('admin')
            <p class="text-muted nav-heading mt-2 mb-1">
                <span>Edukasi</span>
            </p>
            <ul class="navbar-nav flex-fill w-100 mb-2">
                <li class="nav-item w-100">
                    <a class="nav-link" href="{{ route('indexSettingEbook') }}">
                        <i class="fe fe-book fe-16"></i>
                        <span class="ml-3 item-text">Manajemen E-Book</span>
                    </a>
                </li>
            </ul>
        @endrole
        @role('admin')
            <p class="text-muted nav-heading mt-2 mb-1">
                <span>Konsultasi</span>
            </p>
            <ul class="navbar-nav flex-fill w-100 mb-2">
                <li class="nav-item w-100">
                    <a class="nav-link" href="{{ route('indexSettingPsikiater') }}">
                        <i class="fe fe-compass fe-16"></i>
                        <span class="ml-3 item-text">Manajemen Psikiater</span>
                    </a>
                </li>
            </ul>
        @endrole
        @role('user')
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
        @endrole
        @role('admin')
            <p class="text-muted nav-heading mt-2 mb-1">
                <span>Akun</span>
            </p>
            <ul class="navbar-nav flex-fill w-100 mb-2">
                <li class="nav-item w-100">
                    <a class="nav-link" href="{{ route('indexUser') }}">
                        <i class="fe fe-user fe-16"></i>
                        <span class="ml-3 item-text">Manajemen User</span>
                    </a>
                </li>
            </ul>
        @endrole
        @role('user')
            <div class="btn-box w-100 mt-4 mb-1">
                <a href="http://wa.link/qc9ftc" target="_blank" class="btn mb-2 btn-primary btn-lg btn-block">
                    <i class="fe fe-phone fe-12 mx-2"></i><span class="small">Hubungi Kami</span>
                </a>
            </div>
        @endrole
    </nav>
</aside>
