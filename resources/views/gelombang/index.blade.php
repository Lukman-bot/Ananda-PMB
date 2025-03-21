@extends('layout.template')
@section('content')
<!-- Partial Component For Data Gelombang -->
@include('gelombang.component.javascript.datatable')
<!-- End Partial Component For Data Gelombang -->
<div class="row">
    <div class="col-lg-6">
        <div id="flashdata"></div>
        <div class="card">
            <div class="card-header">
                <div class="row">
                    <div class="col-lg-5">
                        <div class="input-group">
                            <input type="text" class="form-control bg-light border-0 small" placeholder="Cari Gelombang"
                                aria-label="Search" aria-describedby="basic-addon2" id="form-search" name="cari">
                            <div class="input-group-append">
                                <button class="btn btn-primary" type="button" onclick="reload()">
                                    <i class="fas fa-search fa-sm"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-7">
                        <div class="float-right">
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
                                <th class="text-truncate" style="text-align: center;">Nama Gelombang</th>
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
