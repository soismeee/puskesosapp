<div class="modal fade" id="modalPengguna" tabindex="-1" aria-labelledby="myModalLabel" aria-hidden="true" data-bs-scroll="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="judulModalPengguna">Judul modal</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form id="form_user">
                @csrf
                <div class="modal-body">
                    <div class="row">
                        <div class="col-12 mb-3">
                            <label>Nama</label>
                            <input type="text" class="form-control name" id="name" name="name" placeholder="Masukan nama user">
                            <input type="hidden" class="form-control" id="id" name="id">
                            <input type="hidden" class="form-control" id="aksi" name="aksi">
                        </div>
                        <div class="col-12 mb-3">
                            <label>Email</label>
                            <input type="email" class="form-control email" id="email" name="email" placeholder="Masukan email">
                        </div>
                        <div class="col-12 mb-3">
                            <label>Password</label>
                            <input type="password" class="form-control password" id="password" name="password" placeholder="Masukan password">
                        </div>
                        <div class="col-12 mb-3">
                            <label>Role</label>
                            <select name="role" id="role" class="form-control role">
                                <option value="1">Admin</option>
                                <option value="2">User</option>
                            </select>
                        </div>
                        <div class="col-12">
                            <label>Status</label>
                            <select name="status" class="form-control status">
                                <option value="aktif">Aktif</option>
                                <option value="non-aktif">Non Aktif</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-dark waves-effect" data-bs-dismiss="modal">Batal</button>
                    <button type="submit" class="btn waves-effect waves-light" id="simpan_user">Simpan</button>
                </div>
            </form>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->