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
    <title>CETAK DATA USER</title>
</head>

<body>
    <div class="form-group">
        <p align="center"><b>Rekap Data User</b></p>
        <table class="static" align="center" rules="all" border="1px" style="width: 95%;">
            <tr>
                <th>No</th>
                <th>Tahun Angakatan</th>
                <th>NIM</th>
                <th>Program Studi</th>
                <th>Nama</th>
                <th>Role</th>
                <th>Email</th>
                <th>No HP</th>
            </tr>
            <tbody>
                @foreach ($pengguna as $item)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $item->tahun }}</td>
                        <td>{{ $item->prodi }}</td>
                        <td>{{ $item->NIM }}</td>
                        <td>{{ $item->name }}</td>
                        <td>{{ $item->level }}</td>
                        <td>{{ $item->email }}</td>
                        <td>{{ $item->nomorhp }}</td>
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
