<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jadwal extends Model
{
    use HasFactory;
    protected $table = "jadwal";
    protected $primaryKey ="id";
    protected $fillable = [
        'id', 
        'waktu',
        'updated_at',
        'created_at',
    ];

    public function get_peminjaman()
    {
        return $this->hasMany(Peminjam::class, 'jadwal_id');
    }
}
