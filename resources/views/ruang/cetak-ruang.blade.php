<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <style>
        table.static {
            position: relative;
            border: 1px solid #543535;
        }

    </style>
    <title>CETAK DATA RUANG</title>
</head>

<body>
    <div class="form-group">
        <p align="center"><b>Rekap Data Ruang</b></p>
        <table class="static" align="center" rules="all" border="1px" style="width: 95%;">
            <tr class="text-center">
                <th>No</th>
                <th>Kode Ruang</th>
                <th>Nama Ruang</th>
                <th>Kapasitas</th>
                <th>Fasilitas</th>
            </tr>
            <tbody>
                @foreach ($ruang as $item)
                    <tr class="text-center">
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $item->kd_ruang }}</td>
                        <td>{{ $item->nm_ruang }}</td>
                        <td>{{ $item->kapasitas }}</td>
                        <td>{{ $item->fasilitas }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <script type="text/javascript">
        window.print();
    </script>
</body>

</html>
