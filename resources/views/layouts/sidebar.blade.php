<!-- ======= Sidebar ======= -->
<aside id="sidebar" class="sidebar">

    <ul class="sidebar-nav" id="sidebar-nav">

        <!-- Dashboard -->
        <li class="nav-item">
            <a class="nav-link" href="/dashboard">
                <i class="bi bi-grid"></i>
                <span>Dashboard</span>
            </a>
        </li>

        <!-- Menu Utama -->
        <li class="nav-item">
            <a class="nav-link collapsed" data-bs-target="#components-nav" data-bs-toggle="collapse" href="#">
                <i class="bi bi-menu-button-wide"></i>
                <span>Menu Utama</span>
                <i class="bi bi-chevron-down ms-auto"></i>
            </a>

            <ul id="components-nav" class="nav-content collapse" data-bs-parent="#sidebar-nav">

                @can('lihat data pegawai')
                <li>
                    <a href="/employee">
                        <i class="bi bi-circle"></i><span>Pegawai</span>
                    </a>
                </li>
                @endcan

                @can('lihat data buku')
                <li>
                    <a href="/book">
                        <i class="bi bi-circle"></i><span>Buku</span>
                    </a>
                </li>
                @endcan

                @can('lihat data kategori')
                <li>
                    <a href="/category">
                        <i class="bi bi-circle"></i><span>Kategori</span>
                    </a>
                </li>
                @endcan

                @can('lihat data rak')
                <li>
                    <a href="/shelf">
                        <i class="bi bi-circle"></i><span>Rak</span>
                    </a>
                </li>
                @endcan

                @can('lihat data peminjaman')
                <li>
                    <a href="/lending">
                        <i class="bi bi-circle"></i><span>Peminjaman</span>
                    </a>
                </li>
                @endcan

            </ul>
        </li>

        <!-- ======= MENU AKADEMIK (PUNYA KAMU) ======= -->
        <li class="nav-item">
            <a class="nav-link collapsed" data-bs-target="#akademik-nav" data-bs-toggle="collapse" href="#">
                <i class="bi bi-mortarboard"></i>
                <span>Manajemen Akademik</span>
                <i class="bi bi-chevron-down ms-auto"></i>
            </a>

            <ul id="akademik-nav" class="nav-content collapse" data-bs-parent="#sidebar-nav">
                <li>
                    <a href="/dosen">
                        <i class="bi bi-circle"></i><span>Dosen</span>
                    </a>
                </li>
                <li>
                    <a href="/mata-kuliah">
                        <i class="bi bi-circle"></i><span>Mata Kuliah</span>
                    </a>
                </li>
                <li>
                    <a href="/krs">
                        <i class="bi bi-circle"></i><span>KRS</span>
                    </a>
                </li>
            </ul>
        </li>
        <!-- ======= END AKADEMIK ======= -->

        <!-- Role & Permission -->
        <li class="nav-item">
            <a class="nav-link collapsed" data-bs-target="#tugas-nav" data-bs-toggle="collapse" href="#">
                <i class="bi bi-journal-text"></i><span>Manajemen Tugas</span><i class="bi bi-chevron-down ms-auto"></i>
            </a>
            <ul id="tugas-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
                <li>
                    <a href="/tugas">
                        <i class="bi bi-list-check"></i><span>Daftar Tugas</span>
                    </a>
                </li>
                <li>
                    <a href="/tugas/pengerjaan"> 
                        <i class="bi bi-pencil-square"></i><span>Input Nilai</span>
                    </a>
                </li>
                <li>
                    <a href="/tugas/laporan">
                        <i class="bi bi-file-earmark-bar-graph"></i><span>Laporan Beban</span>
                    </a>
                </li>
            </ul>
        </li>
        @can('lihat data role permission')
        <li class="nav-item">
            <a class="nav-link collapsed" data-bs-target="#forms-nav" data-bs-toggle="collapse" href="#">
                <i class="bi bi-people"></i>
                <span>Role & Permission</span>
                <i class="bi bi-chevron-down ms-auto"></i>
            </a>

            <ul id="forms-nav" class="nav-content collapse" data-bs-parent="#sidebar-nav">

                @can('lihat data role')
                <li>
                    <a href="/role">
                        <i class="bi bi-circle"></i><span>Role</span>
                    </a>
                </li>
                @endcan

                @can('lihat data permission')
                <li>
                    <a href="/permission">
                        <i class="bi bi-circle"></i><span>Permission</span>
                    </a>
                </li>
                @endcan

            </ul>
        </li>
        @endcan

        <!-- Setting -->
        <li class="nav-heading">Setting</li>

        <li class="nav-item">
            <a class="nav-link collapsed" href="/logout">
                <i class="bi bi-box-arrow-in-right"></i>
                <span>Logout</span>
            </a>
        </li>

    </ul>
</aside>
<!-- End Sidebar -->
