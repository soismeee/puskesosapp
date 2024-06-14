@extends('layout.main')
@section('container')
<div class="page-content">
    <div class="container-fluid">

        <div class="row">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title mb-0">Pengajuan Layanan</h4>
                </div>
                <div class="card-body">
                    <h4>Layanan : <span class="text-primary">{{ $layanan->nama_layanan }}</span></h4>
                    <p>Lengkapi data dibawah ini</p>
                    <hr />
                    <h5><strong>1. Data Personal</strong></h5>
                    <form id="form_pengajuan" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" class="form-control" name="jl_id" id="jl_id" value="{{ $layanan->jl_id }}">
                        <input type="hidden" class="form-control" name="slug" id="slug" value="{{ $layanan->slug }}">
                        <div class="mb-3">
                            <label for="nama" class="form-label">Nama Lengkap</label>
                            <input type="text" class="form-control" placeholder="Masukan nama lengkap" name="nama" id="nama">
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="nik" class="form-label">NIK</label>
                                    <input type="text" class="form-control" placeholder="Masukan NIK" name="nik" id="nik" maxlength="16" onkeypress="return telepon('event')">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="no_kk" class="form-label">Nomor KK</label>
                                    <input type="text" class="form-control" placeholder="Masukan Nomor KK" name="no_kk" id="no_kk"  maxlength="16" onkeypress="return telepon('event')">
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="tempat_lahir" class="form-label">Tempat Lahir</label>
                                    <input type="text" class="form-control" placeholder="Masukan tempat_lahir" name="tempat_lahir" id="tempat_lahir">
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="mb-3">
                                    <label for="tanggal_lahir" class="form-label">Tanggal Lahir</label>
                                    <input type="date" class="form-control" name="tanggal_lahir" id="tanggal_lahir">
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="mb-3">
                                    <label for="tanggal_lahir" class="form-label">Jenis kelamin</label>
                                    <select name="jenis_kelamin" id="jenis_kelamin" class="form-select">
                                        <option selected disabled>Pilih jenis kelamin</option>
                                        <option value="L">Laki-laki</option>
                                        <option value="P">Perempuan</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="mb-3">
                                    <label for="kec_id">Kecamatan</label>
                                    <select name="kec_id" id="kec_id" class="form-select">
                                        <option selected disabled>Pilih kecamatan</option>
                                        @foreach ($kecamatan as $kec)
                                            <option value="{{ $kec->kec_id }}">{{ $kec->nama_kecamatan }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="mb-3">
                                    <label for="dk_id">Desa/Kelurahan</label>
                                    <select name="dk_id" id="dk_id" class="form-select" disabled>
                                        <option selected disabled>Pilih Desa/Kelurahan</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="alamat" class="form-label">Alamat Lengkap</label>
                            <textarea class="form-control" name="alamat" id="alamat" cols="5" rows="2"></textarea>    
                        </div>
                        <hr />

                        <h5><strong>2. Data Pelapor</strong></h5>
                        <div class="row mb-3">
                            <div class="col-lg-6 col-md-12 col-sm-12">
                                <div class="mb-3">
                                    <label for="nama_pelapor" class="form-label">Nama Pelapor</label>
                                    <input type="text" class="form-control" placeholder="Masukan nama pelapor" name="nama_pelapor" id="nama_pelapor" value="{{ auth()->user()->name }}">
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-12 col-sm-12">
                                <div class="mb-3">
                                    <label for="hubungan_pelapor" class="form-label">Hubungan dengan pemerlu layanan</label>
                                    <input type="text" class="form-control" placeholder="Masukan nama pelapor" name="hubungan_pelapor" id="hubungan_pelapor">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-6 col-md-12 col-sm-12">
                                <div class="mb-3">
                                    <label for="no_telepon" class="form-label">No HP</label>
                                    <input type="text" class="form-control" placeholder="Masukan nomor telepon" name="no_telepon" id="no_telepon" onkeypress="return telepon('event')">
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-12 col-sm-12">
                                <div class="mb-3">
                                    <label for="keperluan" class="form-label">Keperluan</label>
                                    <input type="text" class="form-control" placeholder="Tuliskan keperluan" name="keperluan" id="keperluan">
                                </div>
                            </div>
                        </div>
                        <hr />       

                        <h5><strong>3. Berkas Persyaratan</strong></h5>
                        <p><strong>Catatan : </strong>pastikan semua persyaratan sudah dipersiapkan, data yang akan diupload berupa gambar</p>
                        <div class="row">
                            @foreach (json_decode($layanan->syarat) as $sy=>$index)
                                <div class="col-lg-4 mb-3">
                                    <label>{{ $sy }}</label>
                                    <input type="hidden" class="form-control" name="syarat_pengajuan[]" id="syarat_pengajuan" value="{{ $sy }}">
                                    <input type="file" class="form-control" name="berkas[]" id="berkas" accept="image/*" required>
                                </div>
                            @endforeach
                        </div>

                        <div>
                            <button type="submit" class="btn btn-primary w-md" id="simpan">Simpan</button>
                            <a href="/pengajuan" class="btn btn-dark w-md">Batal</a>
                        </div>
                    </form>
                </div>
                <!-- end card body -->
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
        function telepon(evt) {
            var charCode = (evt.which) ? evt.which : event.keyCode
            if (charCode > 31 && (charCode < 48 || charCode > 57))
                return false;
            return true;
        }

        var nama = document.getElementById("nama");
        nama.addEventListener("keyup", function(e) {
            $('#nama').removeClass("is-invalid");
        });

        var nik = document.getElementById("nik");
        nik.addEventListener("keyup", function(e) {
            $('#nik').removeClass("is-invalid");
        });

        var kec_id = document.getElementById("kec_id");
        kec_id.addEventListener("change", function(e) {
            $('#kec_id').removeClass("is-invalid");
        });

        var dk_id = document.getElementById("dk_id");
        dk_id.addEventListener("change", function(e) {
            $('#dk_id').removeClass("is-invalid");
        });

        var no_kk = document.getElementById("no_kk");
        no_kk.addEventListener("keyup", function(e) {
            $('#no_kk').removeClass("is-invalid");
        });

        var tempat_lahir = document.getElementById("tempat_lahir");
        tempat_lahir.addEventListener("keyup", function(e) {
            $('#tempat_lahir').removeClass("is-invalid");
        });

        var tanggal_lahir = document.getElementById("tanggal_lahir");
        tanggal_lahir.addEventListener("change", function(e) {
            $('#tanggal_lahir').removeClass("is-invalid");
        });

        var no_telepon = document.getElementById("no_telepon");
        no_telepon.addEventListener("keyup", function(e) {
            $('#no_telepon').removeClass("is-invalid");
        });

        var jenis_kelamin = document.getElementById("jenis_kelamin");
        jenis_kelamin.addEventListener("change", function(e) {
            $('#jenis_kelamin').removeClass("is-invalid");
        });

        var alamat = document.getElementById("alamat");
        alamat.addEventListener("keyup", function(e) {
            $('#alamat').removeClass("is-invalid");
        });

        var nama_pelapor = document.getElementById("nama_pelapor");
        nama_pelapor.addEventListener("keyup", function(e) {
            $('#nama_pelapor').removeClass("is-invalid");
        });

        var hubungan_pelapor = document.getElementById("hubungan_pelapor");
        hubungan_pelapor.addEventListener("keyup", function(e) {
            $('#hubungan_pelapor').removeClass("is-invalid");
        });

        var keperluan = document.getElementById("keperluan");
        keperluan.addEventListener("keyup", function(e) {
            $('#keperluan').removeClass("is-invalid");
        });
        
        $(document).on('change', '#kec_id', function(e){
            let kec_id = $(this).val()
            $.ajax({
                type: "GET",
                url: "{{ url('json_dk') }}/"+kec_id,
                dataType: "json",
                success: function(response){
                    $('#dk_id').html("<option selected disabled>Pilih desa</option>")
                    $('#dk_id').removeAttr('disabled')
                    let keldes = response.data
                    keldes.forEach(function(items) {
                        $('#dk_id').append(`<option value="`+items.dk_id+`">`+items.nama_dk+`</option>`)
                    })
                },
                error: function(err){
                    $('#dk_id').attr("disabled","disabled")
                    Swal.fire({ icon: 'warning', title: err.responseJSON.message, });
                }
            })
        });

        // pesan error nik dan kk
        function pesanError(pesan){
            sweetAlert("Maaf!", pesan, "warning");
            $('#simpan').prop('disabled', false).html('Simpan');
        }

        $('#form_pengajuan').on('submit', function(event){
            event.preventDefault();
            $('#simpan').prop('disabled', true).html('Loading ...');
            let nik = $('#nik').val();
            if( nik.length < 16 )
                return pesanError('Jumlah NIK harus 16 karakter');
            let no_kk = $('#no_kk').val();
            if( no_kk.length < 16 )
                return pesanError('Jumlah Nomor KK harus 16 karakter');
            $.ajax({
                url: "{{ url('save_pengajuan') }}",
                method: "POST",
                data: new FormData(this),
                dataType:'JSON',
                contentType: false,
                cache: false,
                processData: false,
                success: function(response){
                    sweetAlert("Berhasil!", response.message, "success");
                    window.location.href = '/pengajuan';    
                },
                error: function(err){
                    pesanError('Harap mengisi semua data');
                }
            });
        });
    </script>
@endpush