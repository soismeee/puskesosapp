@extends('layout.main')
@section('container')
<div class="page-content">
    <div class="container-fluid">

        <div class="row">
            <div class="col-xl-12">
                <div class="card">
                    <div class="card-body">
                        <h4>Cek pengajuan</h4>
                        <hr />
                        <div class="row d-flex justify-content-center">
                            <div class="col-lg-4">
                                <input type="text" class="form-control" name="pengajuan" id="pengajuan" placeholder="Masukan nomor register">
                            </div>
                            <div class="col-lg-2">
                                <button class="btn btn-primary">
                                    <i class="fa fas fa-search"></i> Cek
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
         <!-- end row -->

    </div>
    <!-- container-fluid -->
</div>
<!-- End Page-content -->
@endsection