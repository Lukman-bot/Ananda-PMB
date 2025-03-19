<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{url("/dashboard")}}" class="brand-link">
        <img src="{{url("")}}/dist/img/AdminLTELogo.png" alt="PMB - UMTAS Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light">PMB - UMTAS</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                @php
                    use Illuminate\Support\Facades\DB;

                    $cek = DB::table('users')->where('id_users', session()->get('id_users'))->first();
                @endphp
                @if ($cek->foto_profile)
                    @if(file_exists($cek->foto_profile))
                        <div style="background:center no-repeat url({{$cek->foto_profile}}); background-size:cover; width:33.6px; height:33.6px;" class="img-circle elevation-2"></div>
                    @else
                        <div style="background:center no-repeat url({{Avatar::create(session()->get('nama_lengkap'))}}); background-size:cover; width:33.6px; height:33.6px;" class="img-circle elevation-2"></div>
                    @endif
                @else
                    <div style="background:center no-repeat url({{Avatar::create(session()->get('nama_lengkap'))}}); background-size:cover; width:33.6px; height:33.6px;" class="img-circle elevation-2"></div>
                @endif
            </div>
            <div class="info">
                <a href="{{url("/profile")}}" class="d-block">{{session()->get('nama_lengkap')}}</a>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
                    with font-awesome or any other icon font library -->

                <!-- Hak Akses Menu -->
                @if (session()->get('id_role') == '00') <!-- Kondisi Jika Yang Login Itu Super Admin -->
                    @include('layout.menu.super-admin')
                @endif
                <!-- End Hak Akses Menu -->
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
