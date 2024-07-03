@extends('layout.main')
@push('css')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css">
<link rel="stylesheet" href="https://cdn.datatables.net/2.0.8/css/dataTables.bootstrap4.css">
@endpush
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
                            <table class="table mb-0" id="datapengajuan">
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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="https://cdn.datatables.net/2.0.8/js/dataTables.js"></script>
    <script src="https://cdn.datatables.net/2.0.8/js/dataTables.bootstrap4.js"></script>
    <script>
        const table = $('#datapengajuan').DataTable({          
            "lengthMenu": [[5, 10, 25, 50, 100, -1],[5, 10, 25, 50, 100, 'All']],
            "pageLength": 10, 
            processing: true,
            serverSide: true,
            responseive: true,
            ajax: {
                url:"{{ url('json_pj') }}",
                type:"POST",
                data:function(d){
                    d._token = "{{ csrf_token() }}"
                }
            },
            columns:[
                {
                    "targets": "_all",
                    "defaultContent": "-",
                    "render": function(data, type, row, meta){
                        return meta.row + meta.settings._iDisplayStart + 1;
                    }
                },
                {
                    "targets": "_all",
                    "defaultContent": "-",
                    "render": function(data, type, row, meta){
                    return row.pengajuan_id
                    }
                },
                {
                    "targets": "_all",
                    "defaultContent": "-",
                    "render": function(data, type, row, meta){
                    return row.penduduk.nama
                    }
                },
                {
                    "targets": "_all",
                    "defaultContent": "-",
                    "render": function(data, type, row, meta){
                    return row.jenis_layanan.nama_layanan
                    }
                },
                {
                    "targets": "_all",
                    "defaultContent": "-",
                    "render": function(data, type, row, meta){
                        var tanggal = row.tanggal
                        var hari = tanggal.substring(8,10)
                        var bulan = tanggal.substring(7,5)
                        var tahun = tanggal.substring(0,4)
                        return hari+'/'+bulan+"/"+tahun
                    }
                },
                {
                    "targets": "_all",
                    "defaultContent": "-",
                    "render": function(data, type, row, meta){
                        var status = "dark";
                        if (row.status == "Proses") { status = "primary"; }
                        if (row.status == "Selesai") { status = "success"; }
                        return `<span class="badge bg-`+status+`">`+row.status+`</span>`;
                    }
                },
                {
                    "targets": "_all",
                    "defaultContent": "-",
                    "render": function(data, type, row, meta){
                        return `
                        <div class="btn-group">
                            <a href="/get-pengajuan/`+row.pengajuan_id+`" class="btn btn-sm btn-primary lihat">Lihat</a>
                            <a href="#" class="btn btn-sm btn-danger hapus" data-id="`+row.penduduk_nik+`">Hapus</a>
                        </div> 
                        `
                    }
                },
            ]
        });

        $(document).on('change', '.status', function(e){
            e.preventDefault();
            table.ajax.reload();
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
                            table.ajax.reload();
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