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
    <title>CETAK DATA BARANG</title>
</head>

<body>
    <div class="form-group">
        <p align="center"><b>Rekap Data Barang</b></p>
        <table class="static" align="center" rules="all" border="1px" style="width: 95%;">
            <tr class="text-center">
                <th>No</th>
                <th>Kode Barang</th>
                <th>Nama Barang</th>
            </tr>
            <tbody>
                @foreach ($barang as $item)
                    <tr class="text-center">
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $item->kd_barang }}</td>
                        <td>{{ $item->nm_barang }}</td>
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
