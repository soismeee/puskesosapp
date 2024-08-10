@extends('layout.main')
@section('container')
<div class="page-content">
    <div class="container-fluid">

        <div class="row">
            <div class="col-xl-12">
                <div class="card">
                    <div class="card-header">
                            <h4>Nomor Pengajuan : {{ $pengajuan->pengajuan_id }}</h4>

                            <p> Layanan : {{ $pengajuan->jenis_layanan->nama_layanan }} <br />
                                Status : <strong>{{ $pengajuan->status }}</strong> <br />
                                Keterangan : {{ $pengajuan->keterangan }}
                            </p>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-lg-12 col-md-12">
                                <h5>Data Pengajuan</h5>
                                <table class="table table-bordered">
                                    <tr>
                                        <td colspan="3"><strong>1. Data Personal</strong></td>
                                    </tr>
                                    <tr>
                                        <td width="30%">Nama</td>
                                        <td width="5%">:</td>
                                        <td width="65%">{{ $pengajuan->penduduk->nama }}</td>
                                    </tr>
                                    <tr>
                                        <td width="30%">NIK</td>
                                        <td width="5%">:</td>
                                        <td width="65%">{{ $pengajuan->penduduk_nik }}</td>
                                    </tr>
                                    <tr>
                                        <td width="30%">NO KK</td>
                                        <td width="5%">:</td>
                                        <td width="65%">{{ $pengajuan->penduduk->no_kk }}</td>
                                    </tr>
                                    <tr>
                                        <td width="30%">Tempat, Tgl lahir</td>
                                        <td width="5%">:</td>
                                        <td width="65%">{{ $pengajuan->penduduk->tempat_lahir }}, {{ date('d/m/Y', strtotime($pengajuan->penduduk->tanggal_lahir)) }}</td>
                                    </tr>
                                    <tr>
                                        <td width="30%">Jenis Kelamin</td>
                                        <td width="5%">:</td>
                                        <td width="65%">{{ $pengajuan->penduduk->jenis_kelamin }}</td>
                                    </tr>
                                    <tr>
                                        <td width="30%">Alamat</td>
                                        <td width="5%">:</td>
                                        <td width="65%">
                                            {{ $pengajuan->penduduk->alamat }} <br />
                                            Desa/Kel : {{ $pengajuan->penduduk->desa_kelurahan->nama_dk }} <br />
                                            Kecamatan : {{ $pengajuan->penduduk->kecamatan->nama_kecamatan }} <br />
                                        </td>
                                    </tr>
                                    <tr>
                                        <td width="30%">Keperluan</td>
                                        <td width="5%">:</td>
                                        <td width="65%"><strong>{{ $pengajuan->keperluan }}</strong></td>
                                    </tr>
                                    <tr>
                                        <td colspan="3"><strong>2. Data Pelapor</strong></td>
                                    </tr>
                                    <tr>
                                        <td width="30%">Pelapor</td>
                                        <td width="5%">:</td>
                                        <td width="65%">{{ $pengajuan->nama_pelapor }}</td>
                                    </tr>
                                    <tr>
                                        <td width="30%">Telepon</td>
                                        <td width="5%">:</td>
                                        <td width="65%">{{ $pengajuan->penduduk->no_telepon }}</td>
                                    </tr>
                                    <tr>
                                        <td width="30%">Hubungan</td>
                                        <td width="5%">:</td>
                                        <td width="65%">{{ $pengajuan->hubungan_pelapor }}</td>
                                    </tr>
                                </table>
                            </div>
                            <div class="col-lg-12 col-md-12">
                                <h5>Berkas persyaratan</h5>
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th width="50%">Syarat</th>    
                                            <th width="20%">Berkas</th>    
                                            <th width="30%">Upload ulang</th>    
                                        </tr>    
                                    </thead>
                                    <tbody>
                                        <form action="/updateberkas/{{ $pengajuan->pengajuan_id }}" method="post" enctype="multipart/form-data">
                                        @csrf    
                                        @foreach ($berkas as $item)
                                            <tr>
                                                <td>{{ $item['layanan'] }}</td>
                                                <td>
                                                    @if ($item['berkas'] == "Belum di upload")
                                                    {{ $item['berkas'] }}        
                                                    @else
                                                        <button class="btn btn-sm btn-primary lihat_berkas" data-nik="{{ $pengajuan->penduduk_nik }}" data-berkas="{{ $item['berkas'] }}">Lihat berkas</button>
                                                    @endif
                                                </td>
                                                <td>
                                                    <input type="hidden" class="form-control" name="syarat_pengajuan[]" id="syarat_pengajuan" value="{{ $item['syarat_pengajuan'] }}">
                                                    <input type="file" class="form-control" name="berkas[]" id="berkas" accept="image/*,application/pdf">
                                                </td>
                                            </tr>
                                            @endforeach
                                            <input type="hidden" class="form-control" name="penduduk_nik" id="penduduk_nik" value="{{ $pengajuan->penduduk_nik }}">
                                        <tr>
                                            <td colspan="2">Catatan : update berkas yang salah saja</td>
                                            <td><button class="btn btn-primary">Update berkas</button></td>
                                        </tr>
                                        </form>
                                    </tbody>
                                </table>    
                            </div>
                            <hr />
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
@include('pengajuan.dinas.show_berkas')
@endsection

@push('css')

    <script src="/assets/js/jquery-3.6.0.min.js"></script>
    <script>

        $(document).on('change', '.status', function(e){
            let status = $(this).val();
            if (status == "Selesai") { $('#upload_berkas').show(); }
            if (status !== "Selesai") { $('#upload_berkas').hide(); }

            if (status == "Tolak") { $('#keterangan').show(); }
            if (status !== "Tolak") { $('#keterangan').hide(); }

            if (status == "Revisi") { $('#keterangan').show(); }
            if (status !== "Revisi") { $('#keterangan').hide(); }
        });

        $(document).on('click', '.lihat_berkas', function(e){
            e.preventDefault();
            let berkas = $(this).data('berkas');
            let nik = $(this).data('nik');
            $('#modalBerkas').modal('show');
            $('#show_berkas').html(`<img src="/storage/berkas_upload/`+nik+`/`+berkas+`" alt="gambar">`)
        });

        $(document).on('click', '#simpan', function(e){
            e.preventDefault();
            let id = "{{ $pengajuan->pengajuan_id }}";
            $('#simpan').prop('disabled', true).html('Loading ...');
            $.ajax({
                url: "{{ url('save_status') }}/"+id,
                method: "POST",
                data: new FormData($('#form_status')[0]),
                dataType:'JSON',
                contentType: false,
                cache: false,
                processData: false,
                success: function(response){
                    sweetAlert("Berhasil!", response.message, "success");
                    window.location.href = '/pengajuan';    
                },
                error: function(err){
                    $('#simpan').prop('disabled', false).html('Simpan Pengajuan');
                    sweetAlert("Maaf!", err.responseJSON.message, "danger");
                }
            });
        })
    </script>
@endpush