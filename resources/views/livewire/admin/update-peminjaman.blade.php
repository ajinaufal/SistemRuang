<div>
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Peminjaman Ruang</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">Peminjaman Ruang</li>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->

        <!-- Main content -->
        <div class="content">
            <div class="card card-info card-outline">

                <div class="card-body">
                    <form wire:submit.prevent="edit">
                        {{ csrf_field() }}
                        <div class="form-group">
                            <select class="form-control @error('status') is-invalid @enderror" id="status"
                                wire:model="status">
                                <option value="">- Pilih Status -</option>
                                <option value="Mahasiswa">Mahasiswa</option>
                                <option value="Pegawai">Pegawai</option>
                            </select>
                            @error('status')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control @error('name') is-invalid @enderror"
                                wire:model="name" placeholder="Nama Peminjam" required>
                            @error('name')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control @error('no_induk') is-invalid @enderror"
                                wire:model="no_induk" placeholder="NIM/NIP" required>
                            @error('no_induk')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control @error('prodi') is-invalid @enderror"
                                wire:model="prodi" placeholder="Program Studi" required>
                            @error('prodi')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control @error('nohp') is-invalid @enderror"
                                wire:model="nohp" placeholder="No Telepon" required>
                            @error('nohp')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control @error('kegiatan') is-invalid @enderror"
                                wire:model="kegiatan" placeholder="Nama Kegiatan" required>
                            @error('kegiatan')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <input type="date" class="form-control @error('tgl_kegiatan') is-invalid @enderror"
                                wire:model="tgl_kegiatan" placeholder="Tanggal Kegiatan" required>
                            @error('tgl_kegiatan')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <select
                                class="custom-select from-control fstdropdown-select @error('ruang_id') is-invalid @enderror"
                                wire:model="ruang_id" id="id" required>
                                <option value="">- Pilih Ruang -</option>
                                @foreach ($ruang as $ruangan)
                                    <option value="{{ $ruangan->id }}">{{ $ruangan->nm_ruang }}</option>
                                @endforeach
                            </select>
                            @error('ruang_id')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <select
                                class="custom-select from-control fstdropdown-select @error('barang_id') is-invalid @enderror"
                                wire:model="barang_id" id="id" required>
                                <option value="">- Pilih Barang -</option>
                                @foreach ($barang as $barangs)
                                    <option value="{{ $barangs->id }}">{{ $barangs->nm_barang }}</option>
                                @endforeach
                            </select>
                            @error('barang_id')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        @foreach ($jadwal as $jadwals)
                            <div class="form-check form-check-inline">
                                <input class="form-check-input @error('waktu') is-invalid @enderror"
                                    wire:model.defer="waktu" type="radio" name="flexRadioDefault" id="flexRadioDefault1"
                                    value="{{ $jadwals->id }}" @if ($waktu_peminjaman->where('jadwal_id', $jadwals->id)->count() != 0 && $jadwals->id != $var_waktu) disabled @endif>
                                <label class="form-check-label" for="flexRadioDefault1">
                                    {{ $jadwals->waktu }}
                                </label>
                            </div>
                        @endforeach
                        @error('waktu')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                        <div class="form-group">
                            <input type="text" class="form-control @error('peserta') is-invalid @enderror"
                                wire:model="peserta" placeholder="Jumlah Peserta" required>
                            @error('peserta')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <input type="file" class="form-control @error('file') is-invalid @enderror"
                                wire:model="file" placeholder="Upload SIK">
                            @error('file')
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
</div>
