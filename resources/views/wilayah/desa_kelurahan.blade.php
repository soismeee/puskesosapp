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
                            <button class="btn btn-md btn-primary" id="tambah_dk">Tambah Desa/Kelurahan</button>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive" id="data_dk">
                            <table class="table mb-0">

                                <thead class="table-light">
                                    <tr>
                                        <th width="5%">No</th>
                                        <th width="25%">Kecamatan</th>
                                        <th width="60%">Nama Desa/kelurahan</th>
                                        <th width="10%">#</th>
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
    @include('wilayah.modal_dk')
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
            $("#data_dk table tbody").html(`
                <tr>
                    <td colspan="4" class="text-center" id="loading">
                        <div class="spinner-border text-secondary m-1" role="status">
                            <span class="sr-only">Loading...</span>
                        </div>
                    </td>
                </tr>
            `);
        }

        function loaddata(){
            let kec = "{{ $kecamatan->id }}"
            let nama_dk = "{{ $kecamatan->nama_dk }}"
            $.ajax({
                url: "{{ url('json_dk') }}/"+kec,
                type: "GET",
                success: function(response){
                    $('#loading').hide();
                    $("#data_dk table tbody").html("");
                    let data = response.data;
                    let no = 1;
                    data.forEach((params) => {
                        let html = `
                            <tr>
                                <td>${no}</td>
                                <td>${nama_dk}</td>
                                <td>${params.nama_dk}</td>
                                <td>
                                    <div class="btn-group">
                                        <a href="#" data-id="`+params.id+`" class="btn btn-sm btn-warning edit_dk">Edit</a>
                                        <a href="#" data-id="`+params.id+`" class="btn btn-sm btn-danger hapus_dk">Hapus</a>
                                    </div>
                                </td>
                            </tr>
                        `;
                        $("#data_dk table tbody").append(html);
                        no++;
                    });
                },
            });
        }

        $(document).on('click', '#tambah_dk', function(e){
            e.preventDefault();
            let kec_id = "{{ $kecamatan->id }}";
            $('#kec_id').val(kec_id);

            $('#aksi').val("tambah");
            $('#nama_dk').val("");
            $('#simpan_dk').text("Simpan");
            $('#simpan_dk').removeClass('btn-warning');
            $('#simpan_dk').addClass('btn-primary');
            $('#judulModalDK').text("Tambah desa/kelurahan baru");
            $('#modalDK').modal('show');
        });

        $(document).on('click', '.edit_dk', function(e){
            e.preventDefault();
            let id = $(this).data('id');
            $('#aksi').val("tambah");
            $('#simpan_dk').text("Ubah");
            $('#simpan_dk').removeClass('btn-primary');
            $('#simpan_dk').addClass('btn-warning');
            $.ajax({
                url: "{{ url('get_dk') }}/"+id,
                method: "GET",
                success: function(response){
                    $('#judulModalDK').text("Edit desa/kelurahan");
                    $('#modalDK').modal('show');
                    $('#aksi').val("edit");
                    $('#id').val(response.data.id);
                    $('#nama_dk').val(response.data.nama_dk);
                },
                error: function(err){
                    sweetAlert("Maaf!!!", err.responseJSON.message, "error");
                }
            });
        });

        $('#form_dk').on('submit', function(e){
            e.preventDefault();
            let aksi = $('#aksi').val();
            let url = "{{ url('save_dk') }}";
            let type = "POST";
            if (aksi == "edit") {
                let id = $('#id').val();
                url = "{{ url('update_dk') }}/"+id;
                type = "PATCH";
            }
            $.ajax({
                type: type,
                url: url,
                data: $('#form_dk').serialize(),
                dataType: 'json',
                success: function(response){
                    $('#modalDK').modal('hide');
                    loaddata();
                    sweetAlert("Berhasil!", response.message, "success");
                },
                error: function(err){
                    sweetAlert("Maaf!!!", err.responseJSON.message, "error");
                }
            });
        });

        $(document).on('click', '.hapus_dk', function(e){
            e.preventDefault();
            let idhapus = $(this).data('id');
            Swal.fire({
                title:"Anda yakin?",
                text:"Data desa/kelurahan ini akan dihapus!",
                icon:"warning",
                showCancelButton:!0,
                confirmButtonColor:"#51d28c",
                cancelButtonColor:"#f34e4e",
                confirmButtonText:"Yes, delete it!"
            }).then(function(result){
                if (result.value) {
                    $.ajax({
                        type: "DELETE",
                        url: "{{ url('/hapus_dk') }}/"+idhapus,
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