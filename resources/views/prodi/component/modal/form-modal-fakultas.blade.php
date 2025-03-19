<!-- Form Modal -->
<div class="modal fade" id="form-modal-fakultas" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Form Fakultas</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <form id="form-fakultas" method="post">
                @csrf
                <div class="modal-body">
                    <input type="hidden" name="id_fakultas">
                    <div class="form-group">
                        <label for="">Kode Fakultas</label>
                        <input type="text" class="form-control" name="kode_fakultas" id="kode_fakultas" placeholder="Masukkan Kode Fakultas" required>
                    </div>
                    <div class="form-group">
                        <label for="">Nama Fakultas</label>
                        <input type="text" class="form-control" name="nama_fakultas" id="nama_fakultas" placeholder="Masukkan Nama Fakultas" required>
                    </div>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-secondary batal-fakultas" type="button" data-dismiss="modal">Cancel</button>
                    <button class="btn btn-primary simpan-fakultas" type="button" id="btn-save-fakultas">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- End Form Modal -->
