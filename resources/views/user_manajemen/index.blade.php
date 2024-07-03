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
                            <button class="btn btn-md btn-primary" id="tambah_user">Tambah Pengguna Baru</button>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive" id="data_user">
                            <table class="table mb-0">

                                <thead class="table-light">
                                    <tr>
                                        <th width="5%">No</th>
                                        <th width="35%">Nama Pengguna</th>
                                        <th width="25%">Email</th>
                                        <th width="15%">Role</th>
                                        <th width="10%">Status</th>
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
    @include('user_manajemen.modal_user')
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
        $("#data_user table tbody").html(`
                <tr>
                    <td colspan="5" class="text-center" id="loading">
                        <div class="spinner-border text-secondary m-1" role="status">
                            <span class="sr-only">Loading...</span>
                        </div>
                    </td>
                </tr>
            `);
    }

    function loaddata() {
        $.ajax({
            url: "{{ url('json_usr') }}",
            type: "GET",
            success: function(response) {
                $('#loading').hide();
                $("#data_user table tbody").html("");
                let data = response.data;
                let no = 1;
                data.forEach((params) => {
                    let role = params.role;
                    let roles = "Admin";
                    if(role == 2){
                        roles = "User";
                    }
                    let html = `
                            <tr>
                                <td>${no}</td>
                                <td>${params.name} </td>
                                <td>${params.email}</td>
                                <td>${roles}</td>
                                <td>${params.status}</td>
                                <td>
                                    <div class="btn-group">
                                        <a href="#" data-id="` + params.id + `" class="btn btn-sm btn-warning edit_user">Edit</a>
                                    </div>
                                </td>
                            </tr>
                        `;
                    $("#data_user table tbody").append(html);
                    no++;
                });
            },
        });
    }

    $(document).on('click', '#tambah_user', function(e) {
        e.preventDefault();
        $('#aksi').val("tambah");
        $('#name').val("");
        $('#simpan_user').text("Simpan");
        $('#simpan_user').removeClass('btn-warning');
        $('#simpan_user').addClass('btn-primary');
        $('#judulModalPengguna').text("Tambah Pengguna baru");
        $('#modalPengguna').modal('show');
        $('.status').prop('checked', false);
    });

    $(document).on('click', '.edit_user', function(e) {
        e.preventDefault();
        let id = $(this).data('id');
        $('#aksi').val("tambah");
        $('#simpan_user').text("Ubah");
        $('#simpan_user').removeClass('btn-primary');
        $('#simpan_user').addClass('btn-warning');
        $('.status').prop('checked', false);
        $.ajax({
            url: "{{ url('usr') }}/" + id,
            method: "GET",
            success: function(response) {
                $('#judulModalPengguna').text("Edit Pengguna");
                $('#modalPengguna').modal('show');
                $('#aksi').val("edit");
                $('#id').val(response.data.id);
                $('#name').val(response.data.name);
                $('#email').val(response.data.email);
                $('#role').val(response.data.role);
                if (response.data.status == 'aktif') {
                    $('.status').prop('checked', true);
                }
                $('#status').val(response.data.status);
            },
            error: function(err) {
                sweetAlert("Maaf!!!", err.responseJSON.message, "error");
            }
        });
    });

    $('#form_user').on('submit', function(e) {
        e.preventDefault();
        let aksi = $('#aksi').val();
        let url = "{{ url('usr') }}";
        let type = "POST";
        if (aksi == "edit") {
            let id = $('#id').val();
            url = "{{ url('/usr') }}/" + id;
            type = "PATCH";
        }
        $.ajax({
            type: type,
            url: url,
            data: $('#form_user').serialize(),
            dataType: 'json',
            success: function(response) {
                $('#modalPengguna').modal('hide');
                loaddata();
                sweetAlert("Berhasil!", response.message, "success");
            },
            error: function(err) {
                sweetAlert("Maaf!!!", err.responseJSON.message, "error");
            }
        });
    });

    $(document).on('click', '.hapus_user', function(e) {
        e.preventDefault();
        let idhapus = $(this).data('id');
        Swal.fire({
            title: "Anda yakin?",
            text: "Data User ini akan dihapus!",
            icon: "warning",
            showCancelButton: !0,
            confirmButtonColor: "#51d28c",
            cancelButtonColor: "#f34e4e",
            confirmButtonText: "Yes, delete it!"
        }).then(function(result) {
            if (result.value) {
                $.ajax({
                    type: "DELETE",
                    url: "{{ url('/hapus_user') }}/" + idhapus,
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