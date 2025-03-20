@extends('layout.template')
@section('content')
<!-- Partial Component For Data Alamat -->
@include('alamat.component.javascript.datatable-provinsi')
@include('alamat.component.javascript.datatable-kota')
@include('alamat.component.javascript.crud-provinsi')
@include('alamat.component.javascript.crud-kota')
@include('alamat.component.modal.form-provinsi')
@include('alamat.component.modal.form-kota')
<!-- Partial Component For Data Alamat -->
<div class="row">
    <div class="col-lg-12">
        <div id="flashdata"></div>
    </div>
    <div class="col-lg-6">
        <div class="card">
            <div class="card-header">
                Provinsi
                <div class="float-right">
                    <a class="btn btn-primary btn-sm tambah-provinsi" href="javascript:void(0);" title="Tambah Provinsi" data-toggle="modal" data-target="#form-modal-provinsi">
                        <i class="fa fa-plus"></i> Tambah
                    </a>
                </div>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" style="height: 100%" id="tb-provinsi">
                        <thead>
                            <tr>
                                <th class="text-truncate" style="width: 2%; text-align: center;">No</th>
                                <th class="text-truncate" style="text-align: center;">Provinsi</th>
                                <th class="text-truncate" style="width: 10%; text-align: center;">Aksi</th>
                            </tr>
                        </thead>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-6">
        <div class="d-none" id="show-kota">
            <div class="card">
                <div class="card-header">
                    Kota / Kabupaten
                    <div class="float-right d-flex">
                        <a href="javascript:void(0)" class="btn btn-success btn-sm d-flex align-items-center ml-2 tambah-kota" data-toggle="modal" data-target="#form-modal-kota">
                            <i class="fa fa-plus mr-1"></i> Tambah
                        </a>
                    </div>
                </div>
                <div class="card-body">
                    <div id="content-table-kota" class="d-none">
                        <div class="table-responsive">
                            <input type="hidden" name="fk_id_provinsi" id="fk-id-provinsi">
                            <table class="table table-bordered" style="height: 100%" id="tb-kota">
                                <thead>
                                    <tr>
                                        <th class="text-truncate" style="width: 2%; text-align: center;">No</th>
                                        <th class="text-truncate" style="text-align: center;">Kota / Kabupaten</th>
                                        <th class="text-truncate" style="width: 10%; text-align: center;">Aksi</th>
                                    </tr>
                                </thead>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
