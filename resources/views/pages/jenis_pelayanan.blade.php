@extends('layout.main')
@section('container')
<div class="page-content">
    <div class="container-fluid">

        <div class="row">
            <div class="card">
                <div class="card-body">
                    <h4>Jenis Pelayanan</h4>
                    <hr />
                    <div class="row d-flex justify-content-center">
                        <div class="col-lg-2">
                            <label for="">Pilih jenis Pelayanan</label>
                        </div>
                        <div class="col-lg-4">
                            <select class="form-select" name="jenis_pelayanan" id="jenis_pelayanan">
                                <option selected>Pilih layanan</option>
                                <option value="bpjs/kis">BPJS/KIS</option>
                                <option value="bop">Bantuan Operasional Perawatan</option>
                            </select>
                        </div>
                        <div class="col-lg-2">
                            <button class="btn btn-success">
                                Pilih Pelayanan
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
         <!-- end row -->
        <div class="row">
            <div class="card">
                <div class="card-body">
                    <h3 class="text-center">Muncul informasi ketika layanan terpilih</h3>
                </div>
            </div>
        </div>
    </div>
    <!-- container-fluid -->
</div>
<!-- End Page-content -->
@endsection