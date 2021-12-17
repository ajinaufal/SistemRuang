<?php

namespace App\Http\Livewire\Admin;

use App\Models\Barang;
use App\Models\Jadwal;
use App\Models\Peminjam;
use App\Models\Ruang;
use Livewire\Component;

class UpdatePeminjaman extends Component
{
    public $status;
    public $name;
    public $no_induk;
    public $prodi;
    public $nohp;
    public $kegiatan;
    public $waktu;
    public $ruang_id;
    public $barang_id;
    public $peserta;
    public $file;
    public $tgl_kegiatan;

    public $var_waktu;

    public $name_file;
    public $path_file;

    public $no;

    public function mount($id)
    {
        $peminjaman = Peminjam::findorfail($id);
        $this->no = $id;
        $this->name = $peminjaman->name;
        $this->status = $peminjaman->level;
        $this->no_induk = $peminjaman->no_induk;
        $this->prodi = $peminjaman->prodi;
        $this->nohp = $peminjaman->nohp;
        $this->ruang_id = $peminjaman->ruang_id;
        $this->barang_id = $peminjaman->barang_id;
        $this->kegiatan = $peminjaman->kegiatan;
        $this->tgl_kegiatan = $peminjaman->tgl_kegiatan;
        $this->peserta = $peminjaman->peserta;
        $this->var_waktu = $peminjaman->jadwal_id;
        $this->waktu = $peminjaman->jadwal_id;
        $this->name_file = $peminjaman->namefile;
        $this->path_file = $peminjaman->path_file;
    }

    public function edit()
    {
        $credentials = $this->validate([
            'name' => 'required',
            'status' => 'required',
            'no_induk' => 'required|max:13',
            'prodi' => 'required',
            'nohp' => 'required|min:11|max:13',
            'ruang_id' => 'required',
            'barang_id' => 'required',
            'kegiatan' => 'required',
            'tgl_kegiatan' => 'required|date|after_or_equal:today',
            'waktu' => 'required',
            'peserta' => 'required|integer',
        ]);
        $name = $this->name_file;
        $path = $this->path_file;
        if ($this->file) {
            $name = $this->file->getClientOriginalName();
            $path = $this->file->storeAs('SIK', $name, 'public');
        }

        Peminjam::findorfail($this->no)->update([
            'name' => $this->name,
            'level' => $this->status,
            'no_induk' => $this->no_induk,
            'prodi' => $this->prodi,
            'nohp' => $this->nohp,
            'ruang_id' => $this->ruang_id,
            'barang_id' => $this->barang_id,
            'kegiatan' => $this->kegiatan,
            'tgl_kegiatan' => $this->tgl_kegiatan,
            'jadwal_id' => $this->waktu,
            'sts_pinjam' => null,
            'namefile' => $name,
            'path_file' => $path,
        ]);

        return redirect('/peminjaman')->with('success', 'Data Berhasil Diubah!');
    }

    public function render()
    {
        $waktu__peminjaman = collect();
        if ($this->tgl_kegiatan  && $this->ruang_id) {
            $a = Peminjam::where([['tgl_kegiatan', $this->tgl_kegiatan], ['ruang_id', $this->ruang_id]])->get();
            $b = Peminjam::where([['tgl_kegiatan', $this->tgl_kegiatan], ['barang_id', $this->barang_id]])->get();
            $waktu__peminjaman = $a->merge($b)->sort();
        } elseif ($this->tgl_kegiatan && !$this->ruang_id && !$this->barang_id) {
            $waktu__peminjaman =  Peminjam::where([['tgl_kegiatan', $this->tgl_kegiatan]])->get();
        }
        return view('livewire.admin.update-peminjaman', [
            'jadwal' => Jadwal::all(),
            'ruang' => Ruang::all(),
            'barang' => Barang::all(),
            'waktu_peminjaman' => $waktu__peminjaman,
            'var_waktu' => $this->var_waktu,
        ])->layout('layouts_livewire.app', ['title' => 'Update Peminjam']);
    }
}
