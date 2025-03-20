<!-- Form Modal -->
<div class="modal fade" id="form-modal-kota" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Form Kota / Kabupaten</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <form id="form-kota" method="post">
                @csrf
                <div class="modal-body">
                    <input type="hidden" name="id_kota_kabupaten">
                    <div class="form-group">
                        <label for="">Nama Kota / Kabupaten</label>
                        <input type="text" class="form-control" name="nama_kota_kabupaten" id="nama_kota_kabupaten" placeholder="Masukkan Nama Kota / Kabupaten" required>
                    </div>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-secondary batal-kota" type="button" data-dismiss="modal">Cancel</button>
                    <button class="btn btn-primary simpan-kota" type="button" id="btn-save-kota">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- End Form Modal -->
