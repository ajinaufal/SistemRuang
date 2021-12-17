<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Barang extends Model
{
    use HasFactory;
    protected $table = "barang";
    protected $primaryKey ="id";
    protected $fillable = [
        'id',
        'kd_barang',
        'nm_barang',
        'updated_at',
        'created_at',
    ];

    public function get_peminjaman()
    {
        return $this->hasMany(Peminjam::class, 'barang_id');
    }
}
