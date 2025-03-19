@extends('layout.template')
@section('content')
<!-- Partial Component For Data Pengguna -->
@include('pengguna.component.javascript.datatable')
@include('pengguna.component.javascript.crud')
@include('pengguna.component.modal.form')
<!-- End Partial Component For Data Pengguna -->
<div class="row">
    <div class="col-lg-8">
        <div id="flashdata"></div>

        <div class="card">
            <div class="card-header">
                <div class="row">
                    <div class="col-lg-4">
                        <div class="input-group">
                            <input type="text" class="form-control bg-light border-0 small" placeholder="Cari Pengguna"
                                aria-label="Search" aria-describedby="basic-addon2" id="form-search" name="cari">
                            <div class="input-group-append">
                                <button class="btn btn-primary" type="button" onclick="reload()">
                                    <i class="fas fa-search fa-sm"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-8">
                        <div class="float-right d-flex">
                            <select class="form-control" onchange="reload()" id="form-role">
                                <option value="">-- Pilih Role --</option>
                                @foreach($role as $showR)
                                    <option value="{{ str_pad($showR->id_role, 2, '0', STR_PAD_LEFT) }}">{{$showR->role}}</option>
                                @endforeach
                            </select>
                            <a href="javascript:void(0)" class="btn btn-success d-flex align-items-center ml-2" data-toggle="modal" data-target="#form-modal">
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
                                <th class="text-truncate" style="width: 30%; text-align: center;">Nama Pengguna</th>
                                <th class="text-truncate" style="width: 30%; text-align: center;">Alamat Email</th>
                                <th class="text-truncate" style="width: 20%; text-align: center;">Role</th>
                                <th class="text-truncate" style="width: 18%; text-align: center;">Aksi</th>
                            </tr>
                        </thead>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
