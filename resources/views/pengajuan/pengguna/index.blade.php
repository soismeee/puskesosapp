@extends('layout.main')
@section('container')
<div class="page-content">
    <div class="container-fluid">

        <div class="row">
            <div class="col-xl-12">
                <div class="card">
                    <div class="card-header">
                        <div class="d-flex justify-content-between">
                            <div>
                                <h5>Pengajuan layanan</h5>
                                <p><strong>Informasi : </strong>Pengajuan yang <span class="text-danger">selesai</span> diproses otomatis beralir pada menu <span class="text-primary">riwayat pengajuan</span>, Dokumen dapat di unduh pada menu tersebut.</p>
                            </div>
                            <div>
                                <a href="/list-pengajuan" class="btn btn-primary">Buat Pengajuan</a>
                            </div>
                        </div>
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
                                        <th>#</th>
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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js"></script>
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
                url: "{{ url('json_pengajuan') }}",
                type: "GET",
                dataType: "JSON",
                success: function(response) {
                    $('#loading').hide();
                    var no = 1;
                    let html = '';
                    let data = response.data;
                    data.forEach(items => {
                        let tanggal = moment(items.tanggal).format("DD-MM-YYYY");
                        let status = "dark";
                        let ket = " ";
                        let aksi = " ";
                        if (items.status == "Proses") { status = "primary"; }
                        if (items.status == "Revisi") { status = "warning"; ket = "Keterangan: " + items.keterangan; aksi = `<a href="/editpengajuan/`+items.pengajuan_id+`" class="btn btn-sm btn-dark">Edit pengajuan</a>`}
                        if (items.status == "Selesai") { status = "success"; }
                        html = `
                        <tr>
                            <td>`+no+`</td>
                            <td>`+items.pengajuan_id+`</td>
                            <td>`+items.penduduk.nama+`</td>
                            <td>`+items.jenis_layanan.nama_layanan+`</td>
                            <td>`+tanggal+`</td>
                            <td><span class="badge bg-`+status+`">`+items.status+`</span> <br /> `+ket+`</td>
                            <td>`+aksi+`</td>
                        </tr>
                        `;
                        no++;
                        $('#data_pengajuan table tbody').append(html);
                    });
                },
                error: function(err){
                    $('#loading').hide();
                    $('#data_pengajuan table tbody').html(`<tr><td colspan="7" class="text-center">`+err.responseJSON.message+`</td></tr>`);
                }
            });
        }
    </script>
@endpush