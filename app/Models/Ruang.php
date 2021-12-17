<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ruang extends Model
{
    use HasFactory;
    protected $table = "ruang";
    protected $primaryKey ="id";
    protected $fillable = [
        'id', 
        'kd_ruang', 
        'nm_ruang', 
        'kapasitas', 
        'fasilitas',
        'updated_at',
        'created_at',
    ];

    public function get_peminjaman()
    {
        return $this->hasMany(Peminjam::class, 'ruang_id');
    }
}
