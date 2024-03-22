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
                    <form id="form_pengajuan" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" class="form-control" name="jl_id" id="jl_id" value="{{ $layanan->id }}">
                        <div class="mb-3">
                            <label for="nama" class="form-label">Nama Lengkap</label>
                            <input type="text" class="form-control" placeholder="Masukan nama lengkap" name="nama" id="nama">
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="nik" class="form-label">NIK</label>
                                    <input type="text" class="form-control" placeholder="Masukan NIK" name="nik" id="nik">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="no_kk" class="form-label">Nomor KK</label>
                                    <input type="text" class="form-control" placeholder="Masukan Nomor KK" name="no_kk" id="no_kk">
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
                                            <option value="{{ $kec->id }}">{{ $kec->nama_kecamatan }}</option>
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
                        <div class="row">
                            <div class="col-lg-6 col-md-12 col-sm-12">
                                <div class="mb-3">
                                    <label for="nama_pelapor" class="form-label">Nama Pelapor</label>
                                    <input type="text" class="form-control" placeholder="Masukan nama pelapor" name="nama_pelapor" id="nama_pelapor">
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
                        <div class="row">
                            @foreach (json_decode($layanan->syarat) as $sy=>$index)
                                <div class="col-lg-4 mb-3">
                                    <label>{{ $sy }}</label>
                                    <input type="hidden" class="form-control" name="syarat_pengajuan[]" id="syarat_pengajuan" value="{{ $sy }}">
                                    <input type="file" class="form-control" name="berkas[]" id="berkas">
                                </div>
                            @endforeach
                        </div>

                        <div>
                            <button type="submit" class="btn btn-primary w-md">Simpan</button>
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
                        $('#dk_id').append(`<option value="`+items.id+`">`+items.nama_dk+`</option>`)
                    })
                },
                error: function(err){
                    $('#dk_id').attr("disabled","disabled")
                    Swal.fire({ icon: 'warning', title: err.responseJSON.message, });
                }
            })
        });

        $('#form_pengajuan').on('submit', function(event){
            event.preventDefault();
            $.ajax({
                url: "{{ url('save_pengajuan') }}",
                method: "POST",
                data: new FormData(this),
                dataType:'JSON',
                contentType: false,
                cache: false,
                processData: false,
                success: function(response){
                console.log(response);    
                },
                error: function(err){
                    Swal.fire({ icon: 'warning', title: err.responseJSON.message, });
                }
            })
        });
    </script>
@endpush