@extends('layout.main')
@push('css')
<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />
@endpush
@section('container')
<div class="page-content">
    <div class="container-fluid">

        <div class="row">
            <div class="col-xl-12">
                <div class="card">
                    <div class="card-body">
                        <form action="/cetak_pengajuan" method="GET" id="form_laporan">
                            <div class="row">
                                @csrf
                                <div class="col-lg-5 col-md-6 col-sm-12 mb-3">
                                    <input type="text" class="form-control" name="rentang_tanggal" id="rentang_tanggal">
                                </div>
                                <div class="col-lg-4 col-md-6 col-sm-12 mb-3">
                                    <select class="form-select status" name="status">
                                        <option value="All">All</option>
                                        <option value="Pengajuan">Pengajuan</option>
                                        <option value="Proses">Proses</option>
                                        <option value="Selesai">Selesai</option>
                                    </select>
                                </div>
                                <div class="col-lg-3 col-md-6 col-sm-12 mb-3">
                                    <div class="btn-group">
                                        <button type="button" id="cari" class="btn btn-md btn-dark"> <i class="mdi mdi-text-search"></i> Cari</button>
                                        <button type="submit" class="btn btn-md btn-primary"><i class="mdi mdi-printer"></i> Cetak</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                        <div>
                            <hr />
                            <div class="col-lg-12 mt-3">
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
                                        </tbody>
                                    </table>
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

@push('js')
    <script type="text/javascript" src="https://cdn.jsdelivr.net/jquery/latest/jquery.min.js"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>
    {{-- <script src="/assets/js/jquery-3.6.0.min.js"></script> --}}

    <script>
        $(document).ready(function(e){
            loading();
        });

        function loading(){
            $("#data_pengajuan table tbody").html(`
                <tr id="kosong">
                    <td colspan="6" class="text-center">Belum ada pencarian</td>
                </tr>
            `);
        }
        
        $(document).ready(function(e){
            $('input[name="rentang_tanggal"]').daterangepicker();
        });

        $(document).on('click', '#cari', function(e){
            e.preventDefault();
            $('#data_pengajuan table tbody').html("");
            loading();
            let data = $('#form_laporan').serialize();
            $.ajax({
                url: "{{ url('/cari_pengajuan') }}",
                type: "GET",
                data: data,
                dataType: "json",
                success: function(response) {
                    $('#kosong').hide();
                    var no = 1;
                    let html = '';
                    let data = response.data;
                    data.forEach(items => {
                        let tanggal = moment(items.tanggal).format("DD-MM-YYYY");
                        let status = "dark";
                        if (items.status == "Proses") { status = "primary"; }
                        if (items.status == "Selesai") { status = "success"; }
                        html = `
                        <tr>
                            <td>`+no+`</td>
                            <td>`+items.id+`</td>
                            <td>`+items.penduduk.nama+`</td>
                            <td>`+items.jenis_layanan.nama_layanan+`</td>
                            <td>`+tanggal+`</td>
                            <td><span class="badge bg-`+status+`">`+items.status+`</span></td>
                        </tr>
                        `;
                        no++;
                        $('#data_pengajuan table tbody').append(html);
                    });
                },
                error: function(err){
                    $('#loading').hide();
                    $('#data_pengajuan table tbody').html(`<tr><td colspan="6" class="text-center">`+err.responseJSON.message+`</td></tr>`);
                },
            });
        });
    </script>
@endpush