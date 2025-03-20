<!-- Form Modal -->
<div class="modal fade" id="form-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Form Agama</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <form id="form-agama" method="post">
                @csrf
                <div class="modal-body">
                    <input type="hidden" name="id">
                    <div class="form-group">
                        <label for="">Agama</label>
                        <input type="text" class="form-control" name="nama_agama" id="nama_agama" placeholder="Masukkan Agama" required>
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
