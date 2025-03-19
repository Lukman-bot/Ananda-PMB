<!-- Form Modal -->
<div class="modal fade" id="form-modal-prodi" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Form Program Studi</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <form id="form-prodi" method="post">
                @csrf
                <div class="modal-body">
                    <input type="hidden" name="id_program_studi">
                    <div class="form-group">
                        <label for="">Kode Program Studi</label>
                        <input type="text" class="form-control" name="kode_program_studi" id="kode_program_studi" placeholder="Masukkan Kode Program Studi" required>
                    </div>
                    <div class="form-group">
                        <label for="">Nama Program Studi</label>
                        <input type="text" class="form-control" name="nama_program_studi" id="nama_program_studi" placeholder="Masukkan Nama Program Studi" required>
                    </div>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-secondary batal-prodi" type="button" data-dismiss="modal">Cancel</button>
                    <button class="btn btn-primary simpan-prodi" type="button" id="btn-save-prodi">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- End Form Modal -->
