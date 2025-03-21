<!-- Menu Super Admin -->
<li class="nav-item">
    <a href="{{url("/dashboard")}}" class="nav-link {{ Request::segment(1) === 'dashboard' ? 'active' : '' }}">
        <i class="nav-icon fas fa-tachometer-alt"></i>
        <p>
            Dashboard
        </p>
    </a>
</li>
<li class="nav-item">
    <a href="{{url("/pengguna")}}" class="nav-link {{ Request::segment(1) === 'pengguna' ? 'active' : '' }}">
        <i class="nav-icon fas fa-user"></i>
        <p>
            Data Pengguna
        </p>
    </a>
</li>
<li class="nav-item">
    <a href="{{url("/mahasiswa")}}" class="nav-link {{ Request::segment(1) === 'mahasiswa' ? 'active' : '' }}">
        <i class="nav-icon fas fa-user"></i>
        <p>
            Data Mahasiswa
        </p>
    </a>
</li>
<li class="nav-item">
    <a href="{{url("/agama")}}" class="nav-link {{ Request::segment(1) === 'agama' ? 'active' : '' }}">
        <i class="nav-icon fas fa-address-card"></i>
        <p>
            Data Agama
        </p>
    </a>
</li>
<li class="nav-item">
    <a href="{{url("/alamat")}}" class="nav-link {{ Request::segment(1) === 'alamat' ? 'active' : '' }}">
        <i class="nav-icon fas fa-address-book"></i>
        <p>
            Data Alamat
        </p>
    </a>
</li>
<li class="nav-item">
    <a href="{{url("/prodi")}}" class="nav-link {{ Request::segment(1) === 'prodi' ? 'active' : '' }}">
        <i class="nav-icon fas fa-book-open"></i>
        <p>
            Program Studi
        </p>
    </a>
</li>
<li class="nav-item">
    <a href="{{url("/periode")}}" class="nav-link {{ Request::segment(1) === 'periode' ? 'active' : '' }}">
        <i class="nav-icon fas fa-calendar-week"></i>
        <p>
            Periode
        </p>
    </a>
</li>
<li class="nav-item">
    <a href="{{url("/gelombang")}}" class="nav-link {{ Request::segment(1) === 'gelombang' ? 'active' : '' }}">
        <i class="nav-icon fas fa-water"></i>
        <p>
            Gelombang
        </p>
    </a>
</li>
<li class="nav-item">
    <a href="{{url("/jenjang")}}" class="nav-link {{ Request::segment(1) === 'jenjang' ? 'active' : '' }}">
        <i class="nav-icon fas fa-toolbox"></i>
        <p>
            Jenjang
        </p>
    </a>
</li>
<!-- End Menu Super Admin -->
 