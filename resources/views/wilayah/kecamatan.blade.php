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
    $(document).ready(function(e) {
        loading();
        loaddata();
    });

    function loading() {
        $("#data_kecamatan table tbody").html(`
                <tr>
                    <td colspan="4" class="text-center" id="loading">
                        <div class="spinner-border text-secondary m-1" role="status">
                            <span class="sr-only">Loading...</span>
                        </div>
                    </td>
                </tr>
            `);
    }

    function loaddata() {
        $.ajax({
            url: "{{ url('json_kec') }}",
            type: "GET",
            success: function(response) {
                $('#loading').hide();
                $("#data_kecamatan table tbody").html("");
                let data = response.data;
                let no = 1;
                data.forEach((params) => {
                    let html = `
                            <tr>
                                <td>${no}</td>
                                <td>${params.nama_kecamatan}</td>
                                <td><a href="{{ url('dk') }}/` + params.id + `" class="btn btn-sm btn-primary">Lihat Daftar</a></td>
                                <td>
                                    <div class="btn-group">
                                        <a href="#" data-id="` + params.id + `" class="btn btn-sm btn-warning edit_kecamatan">Edit</a>
                                        <a href="#" data-id="` + params.id + `" class="btn btn-sm btn-danger hapus_kecamatan">Hapus</a>
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

    $(document).on('click', '#tambah_kecamatan', function(e) {
        e.preventDefault();
        $('#aksi').val("tambah");
        $('#nama_kecamatan').val("");
        $('#simpan_kecamatan').text("Simpan");
        $('#simpan_kecamatan').removeClass('btn-warning');
        $('#simpan_kecamatan').addClass('btn-primary');
        $('#judulModalKecamatan').text("Tambah kecamatan baru");
        $('#modalKecamatan').modal('show');
    });

    $(document).on('click', '.edit_kecamatan', function(e) {
        e.preventDefault();
        let id = $(this).data('id');
        $('#aksi').val("tambah");
        $('#simpan_kecamatan').text("Ubah");
        $('#simpan_kecamatan').removeClass('btn-primary');
        $('#simpan_kecamatan').addClass('btn-warning');
        $.ajax({
            url: "{{ url('get_kec') }}/" + id,
            method: "GET",
            success: function(response) {
                $('#judulModalKecamatan').text("Edit kecamatan");
                $('#modalKecamatan').modal('show');
                $('#aksi').val("edit");
                $('#id').val(response.data.id);
                $('#nama_kecamatan').val(response.data.nama_kecamatan);
            },
            error: function(err) {
                sweetAlert("Maaf!!!", err.responseJSON.message, "error");
            }
        });
    });

    $('#form_kecamatan').on('submit', function(e) {
        e.preventDefault();
        let aksi = $('#aksi').val();
        let url = "{{ url('save_kec') }}";
        let type = "POST";
        if (aksi == "edit") {
            let id = $('#id').val();
            url = "{{ url('update_kec') }}/" + id;
            type = "PATCH";
        }
        $.ajax({
            type: type,
            url: url,
            data: $('#form_kecamatan').serialize(),
            dataType: 'json',
            success: function(response) {
                $('#modalKecamatan').modal('hide');
                loaddata();
                sweetAlert("Berhasil!", response.message, "success");
            },
            error: function(err) {
                sweetAlert("Maaf!!!", err.responseJSON.message, "error");
            }
        });
    });

    $(document).on('click', '.hapus_kecamatan', function(e) {
        e.preventDefault();
        let idhapus = $(this).data('id');
        Swal.fire({
            title: "Anda yakin?",
            text: "Data kecamatan ini akan dihapus!",
            icon: "warning",
            showCancelButton: !0,
            confirmButtonColor: "#51d28c",
            cancelButtonColor: "#f34e4e",
            confirmButtonText: "Yes, delete it!"
        }).then(function(result) {
            if (result.value) {
                $.ajax({
                    type: "DELETE",
                    url: "{{ url('/hapus_kec') }}/" + idhapus,
                    data: {
                        '_token': '{{ csrf_token() }}'
                    },
                    dataType: 'json',
                    success: function(response) {
                        Swal.fire("Deleted!", "Data ini telah dihapus.", "success")
                        loaddata();
                    },
                    error: function(err) {
                        sweetAlert("Maaf!!!", err.responseJSON.message, "error");
                    }
                });
            }
        });
    });
</script>
@endpush