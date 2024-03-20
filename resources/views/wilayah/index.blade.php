@extends('layout.main')
@section('container')
<div class="page-content">
    <div class="container-fluid">

        <div class="row">
            <div class="col-xl-12">
                <div class="card">
                    <div class="card-header">
                        <div class="d-flex justify-content-between">
                            <label>{{ $title }}</label>
                            <button class="btn btn-md btn-primary" id="tambah_kecamatan">Tambah Kecamatan</button>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive" id="data_kecamatan">
                            <table class="table mb-0">

                                <thead class="table-light">
                                    <tr>
                                        <th width="5%">No</th>
                                        <th width="60%">Nama Kecamatan</th>
                                        <th width="25%">List Desa/Kelurahan</th>
                                        <th width="10%">#</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td colspan="4" class="text-center" id="loading">
                                            <div class="spinner-border text-secondary m-1" role="status">
                                                <span class="sr-only">Loading...</span>
                                            </div>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
         <!-- end row -->
    </div>
    @include('wilayah.modal_kecamatan')
    <!-- container-fluid -->
</div>
<!-- End Page-content -->
@endsection

@push('js')
<script src="/assets/js/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function(e){
            loaddata();
        });

        function loaddata(){
            $.ajax({
                url: "{{ url('json_kec') }}",
                type: "GET",
                success: function(response){
                    $('#loading').hide();
                    let data = response.data;
                    let no = 1;
                    data.forEach((params) => {
                        let html = `
                            <tr>
                                <td>${no}</td>
                                <td>${params.nama_kecamatan}</td>
                                <td><a href="/dk/`+params.id+`" class="btn btn-sm btn-primary">Lihat Daftar</a></td>
                                <td>
                                <div class="btn-group">
                                    <a href="#" data-id="`+params.id+`" class="btn btn-sm btn-warning edit">Edit</a>
                                    <a href="#" class="btn btn-sm btn-danger">Hapus</a>
                                </div>
                                </td>
                            </tr>
                        `;
                        $("#data_kecamatan table tbody").append(html);
                        no++;
                    });
                },
            });
        }

        $(document).on('click', '#tambah_kecamatan', function(e){
            e.preventDefault();
            $('#aksi').val("tambah");
            $('#nama_kecamatan').val("");
            $('#simpan_kecamatan').text("Simpan");
            $('#simpan_kecamatan').removeClass('btn-warning');
            $('#simpan_kecamatan').addClass('btn-primary');
            $('#modalKecamatan').modal('show');
        });

        $(document).on('click', '.edit', function(e){
            e.preventDefault();
            let id = $(this).data('id');
            $('#aksi').val("tambah");
            $('#simpan_kecamatan').text("Ubah");
            $('#simpan_kecamatan').removeClass('btn-primary');
            $('#simpan_kecamatan').addClass('btn-warning');
            $.ajax({
                url: "{{ url('get_kec') }}/"+id,
                method: "GET",
                success: function(response){
                    $('#modalKecamatan').modal('show');
                    $('#aksi').val("edit");
                    $('#id').val(response.data.id);
                    $('#nama_kecamatan').val(response.data.nama_kecamatan);
                },
                error: function(err){
                    sweetAlert("Maaf!!!", err.responseJSON.message, "error");
                }
            });
        });

        $('#form_kecamatan').on('submit', function(e){
            e.preventDefault();
            let aksi = $('#aksi').val();
            let url = "{{ url('save_kec') }}";
            let type = "POST";
            if (aksi == "edit") {
                let id = $('#id').val();
                url = "{{ url('update_kec') }}/"+id;
                type = "PATCH";
            }
            $.ajax({
                type: type,
                url: url,
                data: $('#form_kecamatan').serialize(),
                dataType: 'json',
                success: function(response){
                    $('#modalKecamatan').modal('hide');
                    loaddata();
                    sweetAlert("Berhasil!", response.message, "success");
                },
                error: function(err){
                    sweetAlert("Maaf!!!", err.responseJSON.message, "error");
                }
            });
        })
    </script>
@endpush