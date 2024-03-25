<!DOCTYPE html>
<html>
<head>
    <title>{{ $title }}</title>
</head>
<body>
    <style type="text/css">
        body{
        font-family: sans-serif;
        }
        table{
        margin: 20px auto;
        border-collapse: collapse;
        }
        table th,
        table td{
        border: 1px solid #3c3c3c;
        padding: 3px 8px;
        }
        .tengah{
            text-align: center;
        }
    </style>
    <h2 class='tengah'>{{ $title }}</h2>
    <p>PUSKESOSAPP <br />
        Tanggal cetak : {{ date('d/m/Y') }}</p>
    <table>
        <tr class="tengah">
            <th>No</th>
            <th>Register</th>
            <th>Nama</th>
            <th>Layanan</th>
            <th>Tanggal Pengajuan</th>
            <th>Status</th>
        </tr>
        <tbody>
            @foreach ($pengajuan as $item)
                <tr>
                    <td class="tengah">{{ $loop->iteration }}</td>    
                    <td>{{ $item->id }}</td>            
                    <td class="tengah">{{ $item->penduduk->nama }}</td>       
                    <td class="tengah">{{ $item->jenis_layanan->nama_layanan }}</td>       
                    <td class="tengah">{{ date('d/m/Y', strtotime($item->tanggal)) }}</td>       
                    <td class="tengah">{{ $item->status }}</td>       
                </tr>    
            @endforeach
        </tbody>
    </table>
    <br />
</body>
</html>
<script>
    print()
</script>
