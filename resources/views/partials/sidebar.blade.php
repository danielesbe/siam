<aside id="sidebar-wrapper">
    <div class="sidebar-brand">
        <a href="{{route('siam.dashboard')}}">SIAM</a>
    </div>
    <div class="sidebar-brand sidebar-brand-sm">
        <a href="index.html">SIAM</a>
    </div>
    <ul class="sidebar-menu">

        @can('calon')
        <li class=""><a class="nav-link" href="{{route('ppdb.dataPendaftar')}}"><i class="fas fa-pencil-alt"></i>
            <span>Pendaftaran</span></a></li>
        <li class=""><a class="nav-link" href="{{route('ppdb.print')}}"><i class="fa fa-print"></i>
                <span>Cetak Pendaftaran</span></a></li>
        <li class=""><a class="nav-link" href="{{route('ppdb.hasil')}}"><i class="far fa-clipboard"></i>
                <span>Hasil Seleksi
                </span></a></li>
        @endcan

        @can('TU')
        <li class="menu-header">Menu Petugas TU</li>
        <li class=""><a class="nav-link" href="{{route('siam.user')}}"><i class="fa fa-users"></i>
                <span>Pengguna</span></a></li>
        <li class=""><a class="nav-link" href="{{route('guru.index')}}"><i class="fa fa-user-tie"></i>
                <span>Guru</span></a></li>
        <li class=""><a class="nav-link" href="{{route('murid.index')}}"><i class="fa fa-user-graduate"></i>
                <span>Murid</span></a></li>
        <li ><a class="nav-link" href="{{route('mapel.index')}}"><i class="fa fa-book-open"></i>
                <span>Mapel</span></a></li>
        <li ><a class="nav-link" href="{{route('tahun.index')}}"><i class="fa fa-book-open"></i>
                <span>Tahun Ajaran</span></a></li>
        <li ><a class="nav-link" href="{{route('kelas.index')}}"><i class="fa fa-book-open"></i>
                <span>Kelas </span></a></li>
        <li ><a class="nav-link" href="{{route('nilai.index')}}"><i class="fa fa-user-tie"></i>
                <span>Nilai</span></a></li>
        <li ><a class="nav-link" href="{{route('ppdb.index')}}"><i class="fa fa-users"></i> <span>PPDB</span></a></li>
        <li ><a class="nav-link" href="{{route('setting')}}"><i class="fa fa-cogs"></i> <span>Setting</span></a></li>
        @endcan
        @can('Guru')
        <li class="menu-header">Menu Guru</li>
        <li class=""><a class="nav-link" href="{{route('nilaiPengetahuan.index')}}"><i class="fa fa-book-open"></i>
                <span>Nilai</span></a></li>
        @endcan
        @can('Murid')
        <li class="menu-header">Menu Murid</li>
        <li class=""><a class="nav-link" href="{{route('rapor.murid')}}"><i class="fa fa-book-open"></i>
                <span>Nilai</span></a></li>
        @endcan
        @can('Wakel')
        <li class="menu-header">Menu Wali Kelas</li>
        {{-- <li class="nav-item dropdown">
            <a href="#" class="nav-link has-dropdown"><i class="fas fa-book-open"></i><span>Nilai sikap</span></a>
            <ul class="dropdown-menu">
                <li><a class="nav-link" href="{{route('nilaiSikap.index')}}">Nilai</a></li>
                <li><a class="nav-link" href="index.html">Deskripsi</a></li>
            </ul>
        </li> --}}
        <li class=""><a class="nav-link" href="{{route('nilaiSikap.index')}}"><i class="fa fa-book-open"></i>
            <span>Nilai Sikap</span></a>
        </li>
        <li class=""><a class="nav-link" href="{{route('absensi')}}"><i class="fa fa-book-open"></i>
            <span>Absensi</span></a>
        </li>
        <li class=""><a class="nav-link" href="{{route('catatan')}}"><i class="fa fa-book-open"></i>
            <span>Catatan</span></a>
        </li>
        @endcan

    </ul>
</aside>
