@extends('layout.template')
@section('content')
<!-- Partial Component For Data Mahasiswa -->
@include('mahasiswa.component.javascript.datatable-mahasiswa')
<!-- End Partial Component For Data Mahasiswa -->
<div class="row">
    <div class="col-lg-12">
        <div id="flashdata"></div>
    </div>
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header">
                <div class="row">
                    <div class="col-lg-4">
                        <div class="input-group">
                            <input type="text" class="form-control bg-light border-0 small" placeholder="Cari Mahasiswa"
                                aria-label="Search" aria-describedby="basic-addon2" id="form-search" name="cari">
                            <div class="input-group-append">
                                <button class="btn btn-primary" type="button" onclick="reload()">
                                    <i class="fas fa-search fa-sm"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-8">
                        <div class="float-right">
                            <a href="{{url("mahasiswa/form")}}" class="btn btn-success d-flex align-items-center">
                                <i class="fa fa-plus"></i> Tambah
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" style="height: 100%" id="tb">
                        <thead>
                            <tr>
                                <th class="text-truncate" style="width: 2%; text-align: center;">No</th>
                                <th class="text-truncate" style="text-align: center;">Nama Mahasiswa</th>
                                <th class="text-truncate" style="width: 20%; text-align: center;">Alamat Email</th>
                                <th class="text-truncate" style="width: 8%; text-align: center;">Aksi</th>
                            </tr>
                        </thead>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
