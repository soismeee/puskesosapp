@extends('layout.main')
@section('container')
<div class="page-content">
    <div class="container-fluid">

        <div class="row">
            <div class="col-xl-12">
                <div class="card">
                    <div class="card-header">
                        <label>{{ $title }}</label>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive" id="data_layanan">
                            <table class="table mb-0">

                                <thead class="table-light">
                                    <tr>
                                        <th width="5%">No</th>
                                        <th width="30%">Layanan</th>
                                        <th width="65%">Syarat</th>
                                        {{-- <th width="10%">#</th> --}}
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
                url: "{{ url('get_layanan') }}",
                method: "GET",
                success: function(response){
                    $('#loading').hide();
                    let data = response.data;
                    let no = 1;
                    data.forEach((params) => {
                        let html = `
                            <tr>
                                <td>${no}</td>
                                <td>${params.nama_layanan}</td>
                                <td><div class="syarat`+no+`"></div></td>
                            </tr>
                        `;
                        $("#data_layanan table tbody").append(html);
                        let syarat = JSON.parse(params.syarat);
                        var output = '';
                        $.each(syarat, function(key, value) {
                            output += `<li>`+ value+`</li>`;
                        });
                        $('.syarat'+no).html("<ul>"+output+"</ul>");
                        no++;
                    });
                },
            });
        }
    </script>
@endpush