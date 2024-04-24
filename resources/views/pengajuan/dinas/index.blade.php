@extends('layout.main')
@section('container')
<div class="page-content">
    <div class="container-fluid">

        <div class="row">
            <div class="col-xl-12">
                <div class="card">
                    <div class="card-header">
                        <div class="d-flex justify-content-between">
                            <label for="">Pengajuan layanan</label>
                            <div>
                                <select class="form-select status" name="status">
                                    <option value="All">Semua status &nbsp;</option>
                                    <option value="Pengajuan">Pengajuan</option>
                                    <option value="Proses">Proses</option>
                                    <option value="Selesai">Selesai</option>
                                </select>
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
            loaddata();
        });

        function loading(){
            $("#data_pengajuan table tbody").html(`
                <tr>
                    <td colspan="7" class="text-center" id="loading">
                        <div class="spinner-border text-secondary m-1" role="status">
                            <span class="sr-only">Loading...</span>
                        </div>
                    </td>
                </tr>
            `);
        }

        function loaddata() {
            $('#data_pengajuan table tbody').html("");
            loading();
            $.ajax({
                url: "{{ url('json_pengajuan') }}",
                type: "GET",
                data: { 'status' : $('.status').val() },
                dataType: "JSON",
                success: function(response) {
                    $('#loading').hide();
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
                            <td>`+items.pengajuan_id+`</td>
                            <td>`+items.penduduk.nama+`</td>
                            <td>`+items.jenis_layanan.nama_layanan+`</td>
                            <td>`+tanggal+`</td>
                            <td><span class="badge bg-`+status+`">`+items.status+`</span></td>
                            <td>
                                <div class="btn-group">
                                    <a href="/get-pengajuan/`+items.pengajuan_id+`" class="btn btn-sm btn-primary lihat">Lihat</a>
                                    <a href="#" class="btn btn-sm btn-danger hapus" data-id="`+items.penduduk_nik+`">Hapus</a>
                                </div>    
                            </td>
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

        $(document).on('change', '.status', function(e){
            e.preventDefault();
            loading();
            loaddata();
        });

        $(document).on('click', '.hapus', function(e){
            e.preventDefault();
            let idhapus = $(this).data('id');
            Swal.fire({
                title:"Anda yakin?",
                text:"Data pengajuan ini akan dihapus!",
                icon:"warning",
                showCancelButton:!0,
                confirmButtonColor:"#51d28c",
                cancelButtonColor:"#f34e4e",
                confirmButtonText:"Yes, delete it!"
            }).then(function(result){
                if (result.value) {
                    $.ajax({
                        type: "DELETE",
                        url: "{{ url('/hapus_pengajuan') }}/"+idhapus,
                        data: {
                            '_token': '{{ csrf_token() }}'
                        },
                        dataType: 'json',
                        success: function(response){
                            Swal.fire("Deleted!","Data ini telah dihapus.","success")
                            loaddata();
                        },
                        error: function(err){
                            sweetAlert("Maaf!!!", err.responseJSON.message, "error");
                        }
                    });
                }
            });
        });
    </script>
@endpush