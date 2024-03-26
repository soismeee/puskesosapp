@extends('layout.main')
@section('container')
<div class="page-content">
    <div class="container-fluid">

        <div class="row">
            <div class="col-xl-12">
                <div class="card">
                    <div class="card-body">
                        <h5>Selamat datang di aplikasi puskesos Dinas Sosial Kabupaten Batang</h5>
                        <p>Aplikasi ini menyediakan layanan pengajuan yang berhubungan dengan Pemerintah Kabupaten Batang terkhusus pada Dinas Sosial Kabuapten Batang. <br />
                        Beberapa layanan yang bisa di ajukan adalah :</p>
                        <div class="row">    
                            @foreach ($layanan as $item)
                            <div class="col-lg-6 col-md-6 col-sm-12">
                                <div class="card">
                                    <div class="card-body">
                                        <h4>{{ $loop->iteration }}. {{ $item['nama_layanan'] }}</h4>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                        <p>Mudahkan pengajuan menggunakan aplikasi puskesos ini. Terima kasih. <br />
                        <strong>Catatan : </strong>Persyaratan berlaku, syarat dapat dilihat pada menu Daftar layanan.</p>
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