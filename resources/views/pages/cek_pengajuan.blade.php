@extends('layout.main')
@section('container')
<div class="page-content">
    <div class="container-fluid">

        <div class="row">
            <div class="col-xl-12 col-lg-12 col-md-12">
                <div class="card">
                    <div class="card-body">
                        <h4>Cek pengajuan</h4>
                        <hr />
                        <div class="row d-flex justify-content-center">
                            <div class="col-lg-4">
                                <input type="text" class="form-control" name="pengajuan" id="pengajuan" placeholder="Masukan nomor register">
                            </div>
                            <div class="col-lg-3">
                                <button class="btn btn-primary" id="cari">
                                    <i class="fa fas fa-search"></i> Cek Pengajuan
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-12 col-lg-12 col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h6>Informasi pengajuan layanan</h6>    
                    </div>    
                    <div class="card-body">
                        <div class="row" id="data_pengajuan" style="display: none">
                            <div class="col-lg-12 col-md-12">
                                <h5>Data Pengajuan</h5>
                                <table class="table table-bordered">
                                    <tr>
                                        <td colspan="3">
                                            <h5 id="id">Register</h5>
                                            <span class="tanggal">tanggal</span>
                                            <span class="status">Status</span>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td colspan="3">
                                            <span id="nama_layanan">layanan</span> <br />
                                        </td>
                                    </tr>
                                    <tr>
                                        <td colspan="3"><strong>1. Data Personal</strong></td>
                                    </tr>
                                    <tr>
                                        <td width="30%">Nama</td>
                                        <td width="5%">:</td>
                                        <td width="65%"><span id="nama">Nama</span></td>
                                    </tr>
                                    <tr>
                                        <td width="30%">NIK</td>
                                        <td width="5%">:</td>
                                        <td width="65%"><span id="nik">NIK</span></td>
                                    </tr>
                                    <tr>
                                        <td width="30%">NO KK</td>
                                        <td width="5%">:</td>
                                        <td width="65%"><span id="no_kk">KK</span></td>
                                    </tr>
                                    <tr>
                                        <td width="30%">Tempat, Tgl lahir</td>
                                        <td width="5%">:</td>
                                        <td width="65%"><span id="tempat_lahir">Tempat</span>, <span id="tanggal_lahir">Tanggal</span></td>
                                    </tr>
                                    <tr>
                                        <td width="30%">Jenis Kelamin</td>
                                        <td width="5%">:</td>
                                        <td width="65%"><span id="jenis_kelamin">Jenis kelamin</span></td>
                                    </tr>
                                    <tr>
                                        <td width="30%">Alamat</td>
                                        <td width="5%">:</td>
                                        <td width="65%"><span id="alamat"></span></td>
                                    </tr>
                                    <tr>
                                        <td width="30%">Keperluan</td>
                                        <td width="5%">:</td>
                                        <td width="65%"><strong><span id="keperluan">Keperluan</span></strong></td>
                                    </tr>
                                    <tr>
                                        <td colspan="3"><strong>2. Data Pelapor</strong></td>
                                    </tr>
                                    <tr>
                                        <td width="30%">Pelapor</td>
                                        <td width="5%">:</td>
                                        <td width="65%"><span id="nama_pelapor">Pelapor</span></td>
                                    </tr>
                                    <tr>
                                        <td width="30%">Telepon</td>
                                        <td width="5%">:</td>
                                        <td width="65%"><span id="no_telepon">Telepon</span></td>
                                    </tr>
                                    <tr>
                                        <td width="30%">Hubungan</td>
                                        <td width="5%">:</td>
                                        <td width="65%"><span id="hubungan_pelapor">Hubungan</span></td>
                                    </tr>
                                </table>
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

@push('js')
    {{-- konek internet wajib --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js"></script>

    <script src="/assets/js/jquery-3.6.0.min.js"></script>
    <script>
        $(document).on('click', '#cari', function(e){
            e.preventDefault();
            let id = $('#pengajuan').val();
            if(!id) return sweetAlert("Maaf!", "Layanan harus dipilih", "warning");
            $.ajax({
                url: "{{ url('get_pengajuan') }}/"+id,
                type: "GET",
                success: function(response) {
                    let data = response.data;
                    let status = "<span class='badge bg-dark'>Pengajuan</span>"
                    if (data.status == "Proses") {
                        status = "<span class='badge bg-primary'>Proses</span>"
                    }
                    if (data.status == "Selesai") {
                        status = "<span class='badge bg-success'>Selesai</span>"
                    }

                    $('#id').html(data.id);
                    $('.status').html(status);
                    var tanggal = moment(data.tanggal).format("DD-MM-YYYY");
                    $('.tanggal').text("Tanggal pengajuan : "+tanggal);
                    $('#nama_layanan').html("Layanan : <strong>"+data.jenis_layanan.nama_layanan+"</strong>");
                    $('#nama').text(data.penduduk.nama);
                    $('#nik').text(data.penduduk.nik);
                    $('#no_kk').text(data.penduduk.no_kk);
                    $('#tempat_lahir').text(data.penduduk.tempat_lahir);
                    var tanggal_lahir = moment(data.penduduk.tanggal_lahir).format("DD-MM-YYYY")
                    $('#tanggal_lahir').text(tanggal_lahir);
                    $('#alamat').text(data.penduduk.alamat);
                    $('#keperluan').text(data.keperluan);
                    $('#nama_pelapor').text(data.nama_pelapor);
                    $('#hubungan_pelapor').text(data.hubungan_pelapor);
                    $('#data_pengajuan').show();
                },
                error: function(err){
                    sweetAlert("Maaf!!!", err.responseJSON.message, "error");
                }
            })
        });
    </script>
@endpush