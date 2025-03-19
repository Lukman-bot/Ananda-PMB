@extends('layout.template')
@section('content')
<!-- Partial Component For Data Fakultas & Program Studi -->
@include('prodi.component.javascript.script')
@include('prodi.component.modal.form-modal-fakultas')
@include('prodi.component.modal.form-modal-prodi')
<!-- Partial Component For Data Fakultas & Program Studi -->
<div class="row">
    <div class="col-lg-12">
        <div id="flashdata"></div>
    </div>
    <div class="col-lg-6">
        <div class="card">
            <div class="card-header">
                Fakultas
                <div class="float-right">
                    <a class="btn btn-primary btn-sm tambah-fakultas" href="javascript:void(0);" title="Tambah Fakultas" data-toggle="modal" data-target="#form-modal-fakultas">
                        <i class="fa fa-plus"></i> Tambah
                    </a>
                </div>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" style="height: 100%" id="tb-fakultas">
                        <thead>
                            <tr>
                                <th class="text-truncate" style="width: 2%; text-align: center;">No</th>
                                <th class="text-truncate" style="width: 10%; text-align: center;">Kode</th>
                                <th class="text-truncate" style="width: 78%; text-align: center;">Fakultas</th>
                                <th class="text-truncate" style="width: 10%; text-align: center;">Aksi</th>
                            </tr>
                        </thead>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-6">
        <div class="d-none" id="show-prodi">
            <div class="card">
                <div class="card-header">
                    Program Studi
                    <div class="float-right d-flex">
                        <a href="javascript:void(0)" class="btn btn-success btn-sm d-flex align-items-center ml-2 tambah-prodi" data-toggle="modal" data-target="#form-modal-prodi">
                            <i class="fa fa-plus mr-1"></i> Tambah
                        </a>
                    </div>
                </div>
                <div class="card-body">
                    <div id="content-table-prodi" class="d-none">
                        <div class="table-responsive">
                            <input type="hidden" name="fk_id_fakultas" id="fk-id-fakultas">
                            <table class="table table-bordered" style="height: 100%" id="tb-prodi">
                                <thead>
                                    <tr>
                                        <th class="text-truncate" style="width: 2%; text-align: center;">No</th>
                                        <th class="text-truncate" style="width: 10%; text-align: center;">Kode</th>
                                        <th class="text-truncate" style="width: 78%; text-align: center;">Program Studi</th>
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
