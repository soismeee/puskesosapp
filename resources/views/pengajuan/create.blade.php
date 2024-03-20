@extends('layout.main')
@section('container')
<div class="page-content">
    <div class="container-fluid">

        <div class="row">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title mb-0">Pengajuan Layanan</h4>
                </div>
                <div class="card-body">

                    <form>
                        <div class="mb-3">
                            <label for="nama_lengkap" class="form-label">Nama Lengkap</label>
                            <input type="text" class="form-control" placeholder="Masukan nama lengkap" name="nama_lengkap" id="nama_lengkap">
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="nik" class="form-label">NIK</label>
                                    <input type="text" class="form-control" placeholder="Masukan NIK" name="nik" id="nik">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="no_kk" class="form-label">Nomor KK</label>
                                    <input type="text" class="form-control" placeholder="Masukan Nomor KK" name="no_kk" id="no_kk">
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="tempat_lahir" class="form-label">Tempat Lahir</label>
                                    <input type="text" class="form-control" placeholder="Masukan tempat_lahir" name="tempat_lahir" id="tempat_lahir">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="tgl_lahir" class="form-label">Tanggal Lahir</label>
                                    <input type="date" class="form-control" name="tgl_lahir" id="tgl_lahir">
                                </div>
                            </div>
                        </div>

                        <div class="mb-3">
                            <label for="alamat_lengkap" class="form-label">Alamat Lengkap</label>
                            <textarea class="form-control" name="alamat_lengkap" id="alamat_lengkap" cols="5" rows="2"></textarea>    
                        </div>
                        <hr />
                        <div class="row">
                            <div class="col-lg-4">
                                <div class="mb-3">
                                    <label for="nama_pelapor" class="form-label">Nama Pelapor</label>
                                    <input type="text" class="form-control" placeholder="Masukan nama pelapor" name="nama_pelapor" id="nama_pelapor">
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="mb-3">
                                    <label for="nama_pelapor" class="form-label">Hubungan dengan pemerlu layanan</label>
                                    <input type="text" class="form-control" placeholder="Masukan nama pelapor" name="nama_pelapor" id="nama_pelapor">
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="mb-3">
                                    <label for="no_hp" class="form-label">No HP</label>
                                    <input type="text" class="form-control" placeholder="Masukan nomor telepon" name="no_hp" id="no_hp">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-4">
                                <div class="mb-3">
                                    <label for="desa-kelurahan" class="form-label">Desa/Kelurahan</label>
                                    <input type="text" class="form-control" placeholder="Masukan desa/kelurahan" name="desa-kelurahan" id="desa-kelurahan">
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="mb-3">
                                    <label for="kecamatan" class="form-label">Kecamatan</label>
                                    <input type="text" class="form-control" placeholder="Masukan kecamatan" name="kecamatan" id="kecamatan">
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="mb-3">
                                    <label for="keperluan" class="form-label">Keperluan</label>
                                    <input type="text" class="form-control" placeholder="Tuliskan keperluan" name="keperluan" id="keperluan">
                                </div>
                            </div>
                        </div>

                        <div>
                            <button type="submit" class="btn btn-primary w-md">Simpan</button>
                            <a href="/pengajuan" class="btn btn-dark w-md">Batal</a>
                        </div>
                    </form>
                </div>
                <!-- end card body -->
            </div>
        </div>
         <!-- end row -->

    </div>
    <!-- container-fluid -->
</div>
<!-- End Page-content -->
@endsection