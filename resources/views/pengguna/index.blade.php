@extends('layouts.index')

@section('body')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Data User</h1>
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
                    <div class="card-tools">
                        <a href="{{ route('create-user') }}" class="btn btn-success">Tambah Data <i
                                class="fas fa-plus-square"></i></a>
                        <a href="{{ route('cetak-user') }}" target="_blank" class="btn btn-primary">Cetak Data <i
                                class="fas fa-print"></i></a>
                    </div>
                </div>
                <div class="card-body">
                    <table class="table table-bordered">
                        <tr class="text-center">
                            <th>Tahun Angkatan</th>
                            <th>NIM</th>
                            <th>Program Studi</th>
                            <th>Nama</th>
                            <th>Email</th>
                            <th>No HP</th>
                            <th>Aksi</th>
                        </tr>
                        <tbody>
                            @foreach ($pengguna as $item)
                                <tr class="text-center">
                                    <td>{{ $item->tahun }}</td>
                                    <td>{{ $item->nim }}</td>
                                    <td>{{ $item->prodi }}</td>
                                    <td>{{ $item->name }}</td>
                                    <td>{{ $item->email }}</td>
                                    <td>{{ $item->nomorhp }}</td>
                                    <td>
                                        <a href="{{ url('edit-user', $item->id) }}" class="btn btn-warning btn-xs"><i
                                                class="fas fa-pencil-alt"></i></a>
                                        <a href="{{ url('delete-user', $item->id) }}" class="btn btn-danger btn-xs"><i
                                                class="fas fa-trash-alt"></i></a>
                                        @if ($item->verify == 1)
                                            <a href="{{ route('status-user', ['user_id' => $item->id, 'status_code' => 0]) }}"
                                                class="btn btn-danger btn-xs"><i class="fas fa-ban"></i></a>
                                        @else
                                            <a href="{{ route('status-user', ['user_id' => $item->id, 'status_code' => 1]) }}"
                                                class="btn btn-success btn-xs"><i class="fas fa-check"></i></a>
                                        @endif
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="card-footer clearfix">
                    {{ $pengguna->links() }}
                </div>
            </div>
        </div>
        <!-- /.content -->
    </div>
@endsection
