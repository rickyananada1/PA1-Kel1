<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="http://www.del.ac.id" class="brand-link">
        <img src="{{ asset('frontend/img/icon.jpeg') }}" alt="AdminLTE Logo" class="brand-image elevation-3"
            style="opacity: .8">
        <span class="brand-text font-weight-light">SPI IT DEL</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="{{ asset('backend/dist/img/user2-160x160.jpg') }}" class="img-circle elevation-2"
                    alt="User Image">
            </div>
            <div class="info">
                <a href="{{ route('profil.index') }}" class="d-block">{{ Auth::user()->name }}</a>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                data-accordion="false">
                <li class="nav-item">
                    <a href="{{ route('dashboard') }}" class="nav-link" data-breadcrumb="Dashboard">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                            {{ __('Dashboard') }}
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('pengumuman.index') }}" class="nav-link" data-breadcrumb="Pengumuman">
                        <i class="nav-icon fas fa-bell"></i>
                        <p>
                            {{ __('Pengumuman') }}
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link" data-breadcrumb="Artikel">
                        <i class="nav-icon fas fa-file-alt"></i>
                        <p>{{ __('Artikel') }}<i class="fas fa-angle-left right"></i></p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('artikel.index') }}" class="nav-link" data-breadcrumb="Index Artikel">
                                <i class="far fa-circle"></i>
                                {{ __('Index Artikel') }}
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('kategori.index') }}" class="nav-link"
                                data-breadcrumb="Kategori Artikel">
                                <i class="far fa-circle"></i>
                                {{ __('Kategori Artikel') }}
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link" data-breadcrumb="Event">
                        <i class="nav-icon fas fa-clock"></i>
                        <p>{{ __('Event') }}<i class="fas fa-angle-left right"></i></p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('event.index') }}" class="nav-link" data-breadcrumb="Index Event">
                                <i class="far fa-circle"></i>
                                {{ __('Index Event') }}
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('kategori.index') }}" class="nav-link" data-breadcrumb="Kategori Event">
                                <i class="far fa-circle"></i>
                                {{ __('Kategori Event') }}
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link" data-breadcrumb="Berita">
                        <i class="nav-icon fas fa-globe"></i>
                        <p>{{ __('Berita') }}<i class="fas fa-angle-left right"></i></p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('berita.index') }}" class="nav-link" data-breadcrumb="Index Berita">
                                <i class="far fa-circle"></i>
                                {{ __('Index Berita') }}
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('kategori.index') }}" class="nav-link" data-breadcrumb="Kategori Berita">
                                <i class="far fa-circle"></i>
                                {{ __('Kategori Berita') }}
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link" data-breadcrumb="Pelapor">
                        <i class="nav-icon bi bi-people-fill"></i>
                        <p>{{ __('Pelapor') }}<i class="fas fa-angle-left right"></i></p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('laporan.index') }}" class="nav-link" data-breadcrumb="Index Pelapor">
                                <i class="far fa-circle"></i>
                                {{ __('Index Pelapor') }}
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('kategoriPelapor.index') }}" class="nav-link"
                                data-breadcrumb="Kategori Pelapor">
                                <i class="far fa-circle"></i>
                                {{ __('Kategori Pelapor') }}
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link" data-breadcrumb="Profil">
                        <i class="nav-icon bi bi-people-fill"></i>
                        <p>{{ __('Profil') }}<i class="fas fa-angle-left right"></i></p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('meta.index') }}" class="nav-link" data-breadcrumb="Index Profil">
                                <i class="far fa-circle"></i>
                                {{ __('Index Profil') }}
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link" data-breadcrumb="Create Profil">
                                <i class="far fa-circle"></i>
                                {{ __('Create Profil') }}
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a href="{{ route('faq.index') }}" class="nav-link" data-breadcrumb="FAQ">
                        <i class="nav-icon fas fa-question-circle"></i>
                        <p>
                            {{ __('FAQ') }}
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('galery.index') }}" class="nav-link" data-breadcrumb="Galery">
                        <p><i class="nav-icon bi bi-images"></i> {{ __('Galeri') }}</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('file.index') }}" class="nav-link" data-breadcrumb="File">
                        <p><i class="nav-icon bi bi-files"></i> {{ __('File') }}</p>
                    </a>
                </li>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
@push('js')
    <script>
        // Mendapatkan semua elemen menu dropdown
        var dropdownMenus = document.querySelectorAll('.nav-item > .nav-link > p > .right');

        // Menggunakan event listener untuk setiap elemen menu dropdown
        dropdownMenus.forEach(function(menu) {
            menu.addEventListener('click', function(event) {
                // Menutup semua menu dropdown yang sedang terbuka kecuali yang diklik
                closeDropdownMenus(menu);

                // Mengubah kelas dari elemen menu saat ini
                menu.parentNode.parentNode.classList.toggle('menu-open');
            });
        });
        // Menutup semua menu dropdown yang sedang terbuka kecuali yang diklik
        function closeDropdownMenus(clickedMenu) {
            dropdownMenus.forEach(function(menu) {
                if (menu !== clickedMenu && menu.parentNode.parentNode.classList.contains('menu-open')) {
                    menu.parentNode.parentNode.classList.remove('menu-open');
                }
            });
        }
    </script>
@endpush
