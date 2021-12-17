@extends('layouts.index')

@section('body')

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Dashboard</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">

                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->

        <!-- Main content -->
        <div class="jumbotron">
            <div class="container">
                <center>
                    <h2>SISTEM INFORMASI PEMINJAMAN RUANG
                        <br>
                        SEKOLAH VOKASI
                        <br>
                        UNIVERSITAS SEBELAS MARET(UNS)
                        </br>
                    </h2>
                    <div class="image">
                        <img src="{{ asset('img/uns2.png') }}" width="110" class="img-circle" alt="UNS Logo">
                        <img src="{{ asset('img/sv1.png') }}" width="120" class="img-circle" alt="SV Logo">
                    </div>
                </center>
            </div>
        </div>

        <div class="content">
            <div class="card card-info card-outline">
                <div class="card-body">
                    <table class="table table-bordered">
                        <tr class="text-center">
                            <th>Status Peminjam</th>
                            <th>Nama Peminjam</th>
                            <th>Nama Kegiatan</th>
                            <th>Nomor Handphone</th>
                            <th>Nama Ruang</th>
                            <th>Tanggal Kegiatan</th>
                            <th>Waktu Kegiatan</th>
                        </tr>
                        <tbody>
                            @foreach ($peminjaman as $item)
                                <tr class="text-center">
                                    <td>{{ $item->level }}</td>
                                    <td>{{ $item->name }}</td>
                                    <td>{{ $item->kegiatan }}</td>
                                    <td>{{ $item->nohp }}</td>
                                    <td>{{ $item->get_ruang->nm_ruang }}</td>
                                    <td>{{ $item->tgl_kegiatan }}</td>
                                    <td>{{ $item->get_jadwal->waktu }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="card-footer clearfix">
                    <ul class="pagination pagination-md float-right">
                        {{ $peminjaman->links() }}
                    </ul>
                </div>
            </div>
        </div>

        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->

@endsection
