<div class="modal fade" id="modalDK" tabindex="-1" aria-labelledby="myModalLabel" aria-hidden="true" data-bs-scroll="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="judulModalDK">Judul modal</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form id="form_dk">
                @csrf
                <div class="modal-body">
                    <label>Nama Desa/Kelurahan</label>
                    <input type="text" class="form-control" id="nama_dk" name="nama_dk" placeholder="Masukan nama desa/kelurahan">
                    <input type="hidden" class="form-control" id="id" name="id">
                    <input type="hidden" class="form-control" id="kec_id" name="kec_id">
                    <input type="hidden" class="form-control" id="aksi" name="aksi">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-dark waves-effect" data-bs-dismiss="modal">Batal</button>
                    <button type="submit" class="btn waves-effect waves-light" id="simpan_dk">Simpan</button>
                </div>
            </form>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->