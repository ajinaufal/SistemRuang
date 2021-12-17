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
    <title>CETAK DATA PEMINJAMAN</title>
</head>

<body>
    <div class="form-group">
        <p align="center"><b>Rekap Data Peminjaman</b></p>
        <table class="static" align="center" rules="all" border="1px" style="width: 95%;">
            <tr class="text-center">
                <th>No</th>
                <th>Status Peminjam</th>
                <th>Nama Peminjam</th>
                <th>NIM/NIP</th>
                <th>Program Studi</th>
                <th>No Telepon</th>
                <th>Nama Kegiatan</th>
                <th>Tanggal Kegiatan</th>
                <th>Jam Mulai</th>
                <th>Jam Selesai</th>
                <th>Nama Ruang</th>
                <th>Nama Barang</th>
                <th>Jumlah Peserta</th>
            </tr>
            <tbody>
                @foreach ($peminjaman as $item)
                    <tr class="text-center">
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $item->status }}</td>
                        <td>{{ $item->nama }}</td>
                        <td>{{ $item->no_induk }}</td>
                        <td>{{ $item->prodi }}</td>
                        <td>{{ $item->nohp }}</td>
                        <td>{{ $item->kegiatan }}</td>
                        <td>{{ $item->tgl_kegiatan }}</td>
                        <td>{{ $item->jm_mulai }}</td>
                        <td>{{ $item->jm_akhir }}</td>
                        <td>{{ $item->ruang->nm_ruang }}</td>
                        <td>{{ $item->barang->nm_barang }}</td>
                        <td>{{ $item->peserta }}</td>
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
