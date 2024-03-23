@extends('layout.main')
@section('container')
<div class="page-content">
    <div class="container-fluid">

        <div class="row">
            <div class="col-xl-12">
                <div class="card">
                    <div class="card-header">
                        <h5>Pengajuan layanan</h5>
                        <p><strong>Informasi : </strong>Pengajuan yang telah selesai di proses ada di menu ini, anda dapat mengunduh dokumen yang dibutuhkan.</p>
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
                                        <th>Berkas</th>
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
         <!-- end row -->

    </div>
    <!-- container-fluid -->
</div>
<!-- End Page-content -->
@endsection

@push('js')
    <script src="/assets/js/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function(e){
            loading();
            loaddata();
        });

        function loading(){
            $("#data_pengajuan table tbody").html(`
                <tr>
                    <td colspan="6" class="text-center" id="loading">
                        <div class="spinner-border text-secondary m-1" role="status">
                            <span class="sr-only">Loading...</span>
                        </div>
                    </td>
                </tr>
            `);
        }

        function loaddata() {
            $.ajax({
                url: "{{ url('json_riwayatpengajuan') }}",
                type: "GET",
                dataType: "JSON",
                success: function(response) {
                    $('#loading').hide();
                    var no = 1;
                    let html = '';
                    let data = response.data;
                    let status = "dark";
                    data.forEach(items => {
                        if (items.status == "Proses") { status = "primary"; }
                        if (items.status == "Selesai") { status = "success"; }
                        html += `
                        <tr>
                            <td>`+no+`</td>
                            <td>`+items.id+`</td>
                            <td>`+items.penduduk.nama+`</td>
                            <td>`+items.jenis_layanan.nama_layanan+`</td>
                            <td>`+items.tanggal+`</td>
                            <td><span class="badge bg-`+status+`">`+items.status+`</span></td>
                            <td><a href="{{ asset('storage/dokumen_dinas') }}/`+items.berkas_dinas+`" class="btn btn-sm btn-primary" download> Unduh </a></td>
                        </tr>
                        `;
                        no++;
                    });
                    $('#data_pengajuan table tbody').html(html);
                },
                error: function(err){
                    $('#loading').hide();
                    $('#data_pengajuan table tbody').html(`<tr><td colspan="7" class="text-center">`+err.responseJSON.message+`</td></tr>`);
                }
            });
        }
    </script>
@endpush