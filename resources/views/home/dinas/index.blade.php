@extends('layout.main')
@section('container')
<div class="page-content">
    <div class="container-fluid">

        <div class="row">
            @foreach ($layanan as $item)
            <div class="col-xl-3 col-lg-3">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">{{ $item['nama_layanan'] }}</h4>
                        <p class="card-text">Jumlah Pengajuan : {{ $item['pengajuan'] }}</p>
                    </div>
                </div>
            </div>
            @endforeach
        </div>

        <div class="row">
            <div class="card">
                <div class="card-header">
                    <h5>Daftar pengajuan belum di proses</h5>
                </div>
                <div class="card-body">
                    <div class="table-responsive" id="data_pengajuan">
                        <table class="table mb-0">
                            <thead class="table-light">
                                <tr>
                                    <th>No</th>
                                    <th>Register</th>
                                    <th>Nama</th>
                                    <th>Layanan</th>
                                    <th>Tanggal Pengajuan</th>
                                    <th>Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($pengajuan as $item)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $item->pengajuan_id }}</td>
                                        <td>{{ $item->penduduk->nama }}</td>
                                        <td>{{ $item->jenis_layanan->nama_layanan }}</td>
                                        <td>{{ date('d-m-Y', strtotime($item->tanggal)) }}</td>
                                        <td><span class="badge bg-dark">{{ $item->status }}</span></td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
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