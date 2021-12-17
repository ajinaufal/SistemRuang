@extends('layouts.index')

@section('body')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Data Peminjaman</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">

                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->

        <!-- Main content -->
        <div class="content">
            <div class="card card-info card-outline">
                @if ($message = Session::get('success'))
                    <div class="alert alert-success">
                        <p>{{ $message }}</p>
                    </div>
                @endif
                <div class="card-header">
                    @if (auth()->user()->level == 'Admin')
                        <div class="card-tools">
                            <a href="/create-peminjaman" class="btn btn-success">Tambah Data <i
                                    class="fas fa-plus-square"></i></a>
                            <a href="/cetak-peminjaman" target="_blank" class="btn btn-primary">Cetak Data
                                <i class="fas fa-print"></i></a>
                        </div>
                    @endif
                </div>
                <div class="card-body">
                    <table class="table table-bordered">
                        <tr class="text-center">
                            @if (auth()->user()->level != 'Admin' || auth()->user()->level != 'Moderator')
                                <th>Status Peminjam</th>
                                <th>Nama Peminjam</th>
                                <th>Program Studi</th>
                                <th>Nama Kegiatan</th>
                                <th>Nomor Handphone</th>
                            @endif
                            <th>Nama Ruang</th>
                            <th>Tanggal Kegiatan</th>
                            <th>Waktu</th>
                            <th>Status</th>
                            @if (auth()->user()->level == 'Admin' || auth()->user()->level == 'Moderator')
                                <th>#</th>
                                <th>Aksi</th>
                            @endif

                        </tr>
                        <tbody>
                            @foreach ($peminjaman as $item)
                                <tr class="text-center">
                                    @if (auth()->user()->level != 'Admin' || auth()->user()->level != 'Moderator')
                                        <td>{{ $item->level }}</td>
                                        <td>{{ $item->name }}</td>
                                        <td>{{ $item->prodi }}</td>
                                        <td>{{ $item->kegiatan }}</td>
                                        <td>{{ $item->nohp }}</td>
                                    @endif
                                    <td>{{ $item->get_ruang->nm_ruang }}</td>
                                    <td>{{ $item->tgl_kegiatan }}</td>
                                    <td>{{ $item->get_jadwal->waktu }}</td>
                                    @if ($item->sts_pinjam == null)
                                        <td><span class="badge badge-warning">Menunggu Verifikasi</span>
                                        @elseif($item->sts_pinjam == 1)
                                        <td><span class="badge badge-success">Disetujui</span></td>
                                    @elseif($item->sts_pinjam == 2)
                                        <td><span class="badge badge-danger">Ditolak</span></td>
                                    @endif

                                    @if (auth()->user()->level == 'Admin' || auth()->user()->level == 'Moderator' && $item->tgl_kegiatan >= $today)
                                        <td>
                                            <a href="/setuju/{{ $item->id }}"
                                                class="btn btn-xs btn-primary btn-flat">Setuju</a>
                                            <a href="/tolak/{{ $item->id }}"
                                                class="btn btn-xs btn-danger btn-flat">Tolak</a>
                                        </td>

                                        <td>
                                            <a href="/edit-peminjaman/{{ $item->id }}"
                                                class="btn btn-warning btn-xs"><i class="fas fa-pencil-alt"></i></a>
                                            <a href="/delete-peminjaman/{{ $item->id }}"
                                                class="btn btn-danger btn-xs"><i class="fas fa-trash"></i></a>
                                        </td>
                                    @endif
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
@endsection
