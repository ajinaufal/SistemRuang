<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Models\Jadwal;
use App\Models\Peminjam;
use App\Models\Ruang;
use Carbon\Carbon;
use Illuminate\Http\Request;

class peminjamanController extends Controller
{
    public function index()
    {
        if (auth()->user()->level == 'Admin') {
            $peminjaman = Peminjam::orderBy('created_at', 'desc')->paginate(10);
        } else {
            $peminjaman = Peminjam::where('no_induk', auth()->user()->nim)->orderBy('created_at', 'desc')->paginate(10);
        }
        return view('peminjaman.index', [
            'peminjaman' => $peminjaman,
            'title' => 'Peminjaman',
            'today' => Carbon::now()->format('Y-m-d'),
        ]);
    }

    public function agree($id)
    {
        Peminjam::where('id', $id)->update(['sts_pinjam' => 1]);
        return redirect('/peminjaman');
    }

    public function reject($id)
    {
        Peminjam::where('id', $id)->update(['sts_pinjam' => 2]);
        return redirect('/peminjaman');
    }

    public function cetakdata()
    {
        $peminjaman = Peminjam::get();
        return view('peminjaman.cetak-peminjaman', compact('peminjaman'));
    }

    public function destroy($id)
    {
        $peminjaman = Peminjam::findorfail($id);
        $peminjaman->delete();
        return back()->with('success', 'Data Berhasil Dihapus!');
    }
}
