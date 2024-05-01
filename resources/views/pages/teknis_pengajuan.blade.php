@extends('layout.main')
@section('container')
<div class="page-content">
    <div class="container-fluid">

        <div class="row">
            <div class="col-xl-12">
                <div class="card">
                    <div class="card-body">
                        <h2>Teknis Pengajuan</h2>
                        <div class="row justify-content-center">
                            <div class="col-xl-10">
                                <div class="timeline">
                                    <div class="timeline-container">
                                        <div class="timeline-end">
                                            <p>Mulai</p>
                                        </div>
                                        <div class="timeline-continue">
                                            <div class="row timeline-right">
                                                <div class="col-md-6">
                                                    <div class="timeline-icon">
                                                        <i class="bx bx-id-card text-primary h2 mb-0"></i>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="timeline-box">
                                                        <div class="timeline-date bg-primary text-center rounded">
                                                            <p class="mb-0 text-white-50">Step</p>
                                                            <h3 class="text-white mb-0 font-size-20">1</h3>
                                                        </div>
                                                        <div class="event-content">
                                                            <div class="timeline-text">
                                                                <h3 class="font-size-17">Registrasi akun</h3>
                                                                <p class="mb-0 mt-2 pt-1">Registrasi akun digunakan untuk membuat akun pada aplikasi, 
                                                                    akun tersebut dapat digunakan untuk login. Klik <a href="/register">Registrasi</a> untuk membuat akun.</p>    
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                
                                            <div class="row timeline-left">
                                                <div class="col-md-6 d-md-none d-block">
                                                    <div class="timeline-icon">
                                                        <i class="bx bx-log-in text-primary h2 mb-0"></i>
                                                        </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="timeline-box">
                                                        <div class="timeline-date bg-primary text-center rounded">
                                                            <p class="mb-0 text-white-50">Step</p>
                                                            <h3 class="text-white mb-0 font-size-20">2</h3>
                                                        </div>
                                                        <div class="event-content">
                                                            <div class="timeline-text">
                                                                <h3 class="font-size-17">Login</h3>
                                                                <p class="mb-0 mt-2 pt-1">Login pada aplikasi agar anda dapat membuat pengajuan layanan yang anda butuhkan. 
                                                                    klik tombol dibawah ini untuk login</p>
            
                                                                <a href="/login" class="btn btn-primary btn-rounded waves-effect waves-light mt-4"> Login Sekarang</a>
                                                            </div>
                                                        </div>
                                                        
                                                    </div>
                                                </div>
                                                <div class="col-md-6 d-md-block d-none">
                                                    <div class="timeline-icon">
                                                        <i class="bx bx-log-in text-primary h2 mb-0"></i>
                                                        </div>
                                                </div>
                                            </div>

                                            <div class="row timeline-right">
                                                <div class="col-md-6">
                                                    <div class="timeline-icon">
                                                        <i class="bx bx-bar-chart-square text-primary h2 mb-0"></i>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="timeline-box">
                                                        <div class="timeline-date bg-primary text-center rounded">
                                                            <p class="mb-0 text-white-50">Step</p>
                                                            <h3 class="text-white mb-0 font-size-20">3</h3>
                                                        </div>
                                                        <div class="event-content">
                                                            <div class="timeline-text">
                                                                <h3 class="font-size-17">Daftar Pelayanan</h3>
                                                                <p class="mb-0 mt-2 pt-1">Sebelum melakukan pengajuan layanan, ada beberapa persyaratan yang harus dipenuhi. 
                                                                    Anda dapat melihat daftar persyaratan pada menu jenis pelayanan.</p>
                                                                
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row timeline-left">
                                                <div class="col-md-6 d-md-none d-block">
                                                    <div class="timeline-icon">
                                                        <i class="bx bx-detail text-primary h2 mb-0"></i>
                                                        </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="timeline-box">
                                                        <div class="timeline-date bg-primary text-center rounded">
                                                            <p class="mb-0 text-white-50">Step</p>
                                                            <h3 class="text-white mb-0 font-size-20">4</h3>
                                                        </div>
                                                        <div class="event-content">
                                                            <div class="timeline-text">
                                                                <h3 class="font-size-17">Pengajuan</h3>
                                                                <p class="mb-0 mt-2 pt-1">Menu pengajuan digunakan untuk melihat daftar pengajuan serta tombol pengajuan. </p>
                                                                <p> Anda dapat mengajukan pengajuan layanan dengan cara menekan tombol <strong>Buat Pengajuan</strong> kemudian <strong>pilih jenis layanan</strong>.</p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6 d-md-block d-none">
                                                    <div class="timeline-icon">
                                                        <i class="bx bx-detail text-primary h2 mb-0"></i>
                                                        </div>
                                                </div>
                                            </div>
                
                                            <div class="row timeline-right">
                                                <div class="col-md-6">
                                                    <div class="timeline-icon">
                                                        <i class="bx bx-news text-primary h2 mb-0"></i>
                                                        </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="timeline-box">
                                                        <div class="timeline-date bg-primary text-center rounded">
                                                            <p class="mb-0 text-white-50">Step</p>
                                                            <h3 class="text-white mb-0 font-size-20">5</h3>
                                                        </div>
                                                        <div class="event-content">
                                                            <div class="timeline-text">
                                                                <h3 class="font-size-17">Form Pengajuan</h3>
            
                                                                <p class="mb-0 mt-2 pt-1">Isi semua data pengajuan pada form pengajuan tersebut. Form terdiri dari 3 bagian</p>
                                                                <ul>
                                                                    <li>Data Personal</li>
                                                                    <li>Data Pelapor</li>
                                                                    <li>Berkas Persyaratan</li>
                                                                </ul>
                                                                <p class="mb-0 mt-2 pt-1">Pastikan semua berkas sudah anda penuhi</p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row timeline-left">
                                                <div class="col-md-6 d-md-none d-block">
                                                    <div class="timeline-icon">
                                                        <i class="bx bx-task text-primary h2 mb-0"></i>
                                                        </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="timeline-box">
                                                        <div class="timeline-date bg-primary text-center rounded">
                                                            <p class="mb-0 text-white-50">Step</p>
                                                            <h3 class="text-white mb-0 font-size-20">6</h3>
                                                        </div>
                                                        <div class="event-content">
                                                            <div class="timeline-text">
                                                                <h3 class="font-size-17">Dokumen hasil pengajuan</h3>
                                                                <p class="mb-0 mt-2 pt-1">Setelah berhasil membuat pengajuan, langkah selanjutnya adalah menunggu pengajuan diproses. 
                                                                    Setelah pengajuan selesai di proses anda dapat mengunduh hasil pengajuan berupa <strong>dokumen</strong> dengan cara menekan tombol unduh pada menu pengajuan.</p>
                                                            </div>
                                                        </div>
                                                        
                                                    </div>
                                                </div>
                                                <div class="col-md-6 d-md-block d-none">
                                                    <div class="timeline-icon">
                                                        <i class="bx bx-task text-primary h2 mb-0"></i>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="timeline-start">
                                            <p>Selesai</p>
                                        </div>
                                        <div class="timeline-launch">
                                            <div class="timeline-box">
                                                <div class="timeline-text">
                                                    <h3 class="font-size-17">PUSKESOS DINAS SOSIAL KABUPATEN BATANG</h3>
                                                    {{-- <p class="text-muted mb-0">Pellentesque sapien ut est.</p> --}}
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
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