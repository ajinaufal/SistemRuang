@extends('layouts.index')

@section('body')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Edit Data User</h1>
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
                    <form action="{{ url('update-user', $pengguna->id) }}" method="post">
                        {{ csrf_field() }}
                        <div class="form-group">
                            <input type="text" class="form-control @error('NIM') is-invalid @enderror" name="NIM"
                                placeholder="NIM" value="{{ $pengguna->nim }}">
                            @error('NIM')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control @error('tahun') is-invalid @enderror" name="tahun"
                                placeholder="Tahun Angkatan" value="{{ $pengguna->tahun }}">
                            @error('tahun')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control @error('prodi') is-invalid @enderror" name="prodi"
                                placeholder="Program Studi" value="{{ $pengguna->prodi }}">
                            @error('prodi')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control @error('name') is-invalid @enderror" name="name"
                                placeholder="Nama Lengkap" value="{{ $pengguna->name }}">
                            @error('name')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <input type="email" class="form-control @error('email') is-invalid @enderror" name="email"
                                placeholder="Email" value="{{ $pengguna->email }}">
                            @error('email')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control @error('nomorhp') is-invalid @enderror" name="nomorhp"
                                placeholder="Nomor Telepon" value="{{ $pengguna->nomorhp }}">
                            @error('nomorhp')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary">Ubah Data</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!-- /.content -->
    </div>
@endsection
