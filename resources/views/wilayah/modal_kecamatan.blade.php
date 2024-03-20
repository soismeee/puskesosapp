<div class="modal fade" id="modalKecamatan" tabindex="-1" aria-labelledby="myModalLabel" aria-hidden="true" data-bs-scroll="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="myModalLabel">Judul modal</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form id="form_kecamatan">
                @csrf
                <div class="modal-body">
                    <label>Nama Kecamatan</label>
                    <input type="text" class="form-control" id="nama_kecamatan" name="nama_kecamatan" placeholder="Masukan nama kecamatan">
                    <input type="hidden" class="form-control" id="id" name="id">
                    <input type="hidden" class="form-control" id="aksi" name="aksi">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-dark waves-effect" data-bs-dismiss="modal">Batal</button>
                    <button type="submit" class="btn waves-effect waves-light" id="simpan_kecamatan">Simpan</button>
                </div>
            </form>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->