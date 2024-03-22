@extends('layout.main')
@section('container')
<div class="page-content">
    <div class="container-fluid">

        <div class="row">
            <div class="col-xl-12">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <h4 class="mb-3">Pilih layanan yang akan anda ajukan</h4>
                            @foreach ($layanan as $item)
                                <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12">
                                    <div class="card">
                                        <div class="card-body">
                                            <div class="d-flex justify-content-between mb-3">
                                                <h3>{{ $item->nama_layanan }}</h3>
                                                <a href="{{ url('form-pengajuan') }}/{{ $item->id }}" class="btn btn-primary">Pilih Layanan</a>
                                            </div>
                                            <strong>Persyaratan layanan : </strong>
                                            <ul class="mt-2">
                                                @foreach (json_decode($item->syarat) as $index)
                                                <li>{{ $index }}</li>
                                                @endforeach
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
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