<?php

namespace App\Http\Livewire\Admin;

use App\Models\Barang;
use App\Models\Jadwal;
use App\Models\Peminjam;
use App\Models\Ruang;
use Livewire\Component;
use Livewire\WithFileUploads;

class CreatePeminjaman extends Component
{

    use WithFileUploads;

    public $status;
    public $name;
    public $no_induk;
    public $prodi;
    public $nohp;
    public $kegiatan;
    public $waktu = [];
    public $ruang_id;
    public $barang_id;
    public $peserta;
    public $file;
    public $tgl_kegiatan;

    public $notif;

    public function create()
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
            'file' => 'required|mimes:doc,pdf,docx,jpg,png',
        ]);
        $name = $this->file->getClientOriginalName();
        $path = $this->file->storeAs('SIK', $name, 'public');
        foreach ($this->waktu as $value) {
            Peminjam::create([
                'name' => $this->name,
                'level' => $this->status,
                'no_induk' => $this->no_induk,
                'prodi' => $this->prodi,
                'nohp' => $this->nohp,
                'ruang_id' => $this->ruang_id,
                'barang_id' => $this->barang_id,
                'kegiatan' => $this->kegiatan,
                'tgl_kegiatan' => $this->tgl_kegiatan,
                'jadwal_id' => $value,
                'sts_pinjam' => null,
                'peserta' => $this->peserta,
                'namefile' => $name,
                'path_file' => $path,
            ]);
        }
        return redirect('/peminjaman')->with('success', 'Data Berhasil Ditambahkan!');
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
        return view('livewire.admin.create-peminjaman', [
            'jadwal' => Jadwal::all(),
            'ruang' => Ruang::all(),
            'barang' => Barang::all(),
            'waktu_peminjaman' => $waktu__peminjaman,
        ])->layout('layouts_livewire.app', ['title' => 'Create Peminjaman']);
    }
}
