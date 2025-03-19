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
    <a href="{{url("/prodi")}}" class="nav-link {{ Request::segment(1) === 'prodi' ? 'active' : '' }}">
        <i class="nav-icon fas fa-book-open"></i>
        <p>
            Program Studi
        </p>
    </a>
</li>
<!-- End Menu Super Admin -->
 