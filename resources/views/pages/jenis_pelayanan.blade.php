@extends('layout.main')
@section('container')
<div class="page-content">
    <div class="container-fluid">

        <div class="row">
            <div class="card">
                <div class="card-body">
                    <h4>Jenis Pelayanan</h4>
                    <hr />
                    <div class="row d-flex justify-content-center">
                        <div class="col-lg-2">
                            <label for="">Pilih jenis Pelayanan</label>
                        </div>
                        <div class="col-lg-4">
                            <select class="form-select" name="jenis_pelayanan" id="jenis_pelayanan">
                                <option selected disabled>Pilih layanan</option>
                                @foreach ($layanan as $item)
                                    <option value="{{ $item->jl_id }}">{{ $item->nama_layanan }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-lg-2">
                            <button class="btn btn-success" id="cari">
                                Pilih Pelayanan
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
         <!-- end row -->
        <div class="row">
            <div class="card">
                <div class="card-header">
                    <h6>Informasi persyaratan layanan</h6>
                </div>
                <div class="card-body">
                    <div class="row" id="informasi">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- container-fluid -->
</div>
<!-- End Page-content -->
@endsection

@push('js')

    <script src="/assets/js/jquery-3.6.0.min.js"></script>
    <script>
        $(document).on('click', '#cari', function(e){
            e.preventDefault();
            let id = $('#jenis_pelayanan').val();
            if(!id) return sweetAlert("Maaf!", "Layanan harus dipilih", "warning");
            $.ajax({
                url: "{{ url('get_l') }}/"+id,
                type: "GET",
                success: function(response) {
                    var output = '';
                    let no = 1;
                    let data = JSON.parse(response.data.syarat);
                    $.each(data, function(key, value) {
                        output += `<div class="col-lg-4">
                                        <div class="card">
                                            <div class="card-body">
                                                <h5>`+no+`. `+value+`</h5>
                                            </div>
                                        </div>
                                    </div>`;
                                    no++;
                    });
                    $('#informasi').html(output);
                },
                error: function(err){
                    sweetAlert("Maaf!!!", err.responseJSON.message, "error");
                }
            })
        });
    </script>
@endpush