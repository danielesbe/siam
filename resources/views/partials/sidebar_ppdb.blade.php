<aside id="sidebar-wrapper">
    <div class="sidebar-brand">
        <a href="{{route('siam.dashboard')}}">PPDB</a>
    </div>
    <div class="sidebar-brand sidebar-brand-sm">
        <a href="index.html">PPDB</a>
    </div>
    <ul class="sidebar-menu">
        <li class="menu-header">Menu PPDB</li>
        <li class=""><a class="nav-link" href="{{route('ppdb.pendaftaran')}}"><i class="fas fa-pencil-alt"></i>
                <span>Pendaftaran</span></a></li>
        {{-- <li class=""><a class="nav-link" href="{{route('siam.user')}}"><i class="fa fa-print"></i>
                <span>Cetak Pendaftaran</span></a></li> --}}
        <li class=""><a class="nav-link" href="{{route('ppdb.hasil')}}"><i class="far fa-clipboard"></i>
                <span>Hasil Seleksi</span></a></li>
    </ul>
</aside>
