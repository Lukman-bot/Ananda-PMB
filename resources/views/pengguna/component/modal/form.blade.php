<!-- Form Modal -->
<div class="modal fade" id="form-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Form Pengguna</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <form id="form-pengguna" method="post">
                @csrf
                <div class="modal-body">
                    <input type="hidden" name="id">
                    <div class="form-group">
                        <label for="">Nama Pengguna</label>
                        <input type="text" class="form-control" name="full_name" id="full_name" placeholder="Masukkan Nama Pengguna" required>
                    </div>
                    <div class="form-group">
                        <label for="">Alamat Email</label>
                        <input type="text" class="form-control" name="alamat_email" id="alamat_email" placeholder="Masukkan Alamat Email" required>
                    </div>
                    <div class="form-group">
                        <label for="">Jenis Pengguna</label>
                        <select name="id_role" id="id_role" class="form-control" required>
                            <option value="">--Pilih Jenis Pengguna--</option>
                            @foreach ($role as $show)
                                <option value="{{ str_pad($show->id_role, 2, '0', STR_PAD_LEFT) }}">{{$show->role}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="">Password</label>
                        <div class="input-group">
                            <input type="password" class="form-control" name="password" id="password" placeholder="Masukkan Password">
                            <div class="input-group-append">
                                <button type="button" class="btn btn-outline-secondary toggle-password">
                                    <i class="fa fa-eye"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-secondary batal" type="button" data-dismiss="modal">Cancel</button>
                    <button class="btn btn-primary simpan" type="submit" id="btn-save">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- End Form Modal -->
