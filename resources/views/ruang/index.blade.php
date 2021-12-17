@extends('layouts.index')

@section('body')

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Data Ruang</h1>
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
                            <a href="/create-ruang" class="btn btn-success">Tambah Data <i
                                    class="fas fa-plus-square"></i></a>
                            <a href="/cetak-ruang" class="btn btn-primary" target="_blank">Cetak Data <i
                                    class="fas fa-print"></i></a>
                        </div>
                    @endif
                </div>
                <div class="card-body">
                    <table class="table table-bordered">
                        <tr class="text-center">
                            <th>Kode Ruang</th>
                            <th>Nama Ruang</th>
                            <th>Kapasitas</th>
                            <th>Fasilitas</th>
                            @if (auth()->user()->level == 'Admin' || auth()->user()->level == 'Moderator')
                                <th>Aksi</tf>
                            @endif
                        </tr>
                        <tbody>
                            @foreach ($ruang as $item)
                                <tr class="text-center">
                                    <td>{{ $item->kd_ruang }}</td>
                                    <td>{{ $item->nm_ruang }}</td>
                                    <td>{{ $item->kapasitas }}</td>
                                    <td>{{ $item->fasilitas }}</td>
                                    @if (auth()->user()->level == 'Admin' || auth()->user()->level == 'Moderator')
                                        <td>
                                            <a href="/edit-ruang/{{ $item->id }}" class="btn btn-warning btn-xs"><i
                                                    class="fas fa-pencil-alt"></i></a>
                                            <a href="/delete-ruang/{{ $item->id }}" class="btn btn-danger btn-xs"><i
                                                    class="fas fa-trash-alt"></i></a>
                                        </td>
                                    @endif
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="card-footer clearfix">
                    {{ $ruang->links() }}
                </div>
            </div>
        </div>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->

@endsection
