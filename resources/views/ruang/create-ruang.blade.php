@extends('layouts.index')

@section('body')

    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Tambah Data Ruang</h1>
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

                <div class="card-body">
                    <form action="/simpan-ruang" method="post">
                        {{ csrf_field() }}
                        <div class="form-group">
                            <input type="text" class="form-control @error('kd_ruang') is-invalid @enderror" name="kd_ruang"
                                placeholder="Kode Ruang">
                            @error('kd_ruang')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control @error('nm_ruang') is-invalid @enderror" name="nm_ruang"
                                placeholder="Nama Ruang">
                            @error('nm_ruang')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control @error('kapasitas') is-invalid @enderror"
                                name="kapasitas" placeholder="Kapasitas">
                            @error('kapasitas')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control @error('fasilitas') is-invalid @enderror"
                                name="fasilitas" placeholder="Fasilitas">
                            @error('fasilitas')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-success">Simpan Data</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!-- /.content -->
    </div>

@endsection
