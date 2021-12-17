<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Peminjam extends Model
{
    use HasFactory;
    protected $table = "peminjaman";
    protected $primaryKey ="id";
    protected $fillable = [
        'id', 
        'name',
        'level',
        'no_induk',
        'prodi',
        'nohp',
        'ruang_id', 
        'barang_id', 
        'tgl_kegiatan',
        'jadwal_id',
        'sts_pinjam',
        'peserta',
        'path_file',
        'namefile',
        'kegiatan',
        'updated_at',
        'created_at',
    ];

    public function get_user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function get_barang()
    {
        return $this->belongsTo(Barang::class, 'barang_id');
    }

    public function get_ruang()
    {
        return $this->belongsTo(Ruang::class, 'ruang_id');
    }
    public function get_jadwal()
    {
        return $this->belongsTo(Jadwal::class, 'jadwal_id');
    }
}
