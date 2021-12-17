<?php

namespace App\Http\Controllers;

use App\Models\Peminjam;
use Illuminate\Http\Request;

class berandaController extends Controller
{
    public function index()
    {
        return view('beranda.index', [
            'title' => 'Beranda',
            'peminjaman' => Peminjam::where('sts_pinjam', null)->orwhere('sts_pinjam', 1)->orderBy('created_at', 'desc')->paginate(10),
        ]);
    }
}
