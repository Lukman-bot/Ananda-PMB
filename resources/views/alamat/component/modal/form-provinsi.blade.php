<!-- Form Modal -->
<div class="modal fade" id="form-modal-provinsi" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Form Provinsi</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <form id="form-provinsi" method="post">
                @csrf
                <div class="modal-body">
                    <input type="hidden" name="id_provinsi">
                    <div class="form-group">
                        <label for="">Nama Provinsi</label>
                        <input type="text" class="form-control" name="nama_provinsi" id="nama_provinsi" placeholder="Masukkan Nama Provinsi" required>
                    </div>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-secondary batal-provinsi" type="button" data-dismiss="modal">Cancel</button>
                    <button class="btn btn-primary simpan-provinsi" type="button" id="btn-save-provinsi">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- End Form Modal -->
