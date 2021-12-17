<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use Illuminate\Http\Request;

class barangController extends Controller
{
    public function index()
    {
        $barang= Barang::paginate(10);
        return view('barang.index', [
            'barang' => $barang,
            'title'  => 'Barang'
        ]);
    }

    public function cetakbarang()
    {
        $barang = Barang::get();
        return view('barang.cetak-barang', compact('barang'));
    }

    public function create()
    {
        $barang = Barang::all();
        return view('barang.create-barang', [
            'title'     =>  'Create Barang',
            'barang'    =>  $barang,
        ]);
    }

    public function store(Request $request)
    {
        $credentials = $request->validate([
            'kd_barang' => 'required',
            'nm_barang' => 'required',
        ]);
        Barang::create([
            'kd_barang' => $request->kd_barang,
            'nm_barang' => $request->nm_barang,
        ]);
        return redirect('/barang')->with('success', 'Data Berhasil Ditambahkan!');
    }

    public function edit($id)
    {
        $barang = Barang::findorfail($id);
        return view('barang.edit-barang', [
            'title'     =>  'Edit Barang',
            'barang'    =>  $barang,
        ]);
    }

    public function update(Request $request, $id)
    {
        $credentials = $request->validate([
            'kd_barang' => 'required',
            'nm_barang' => 'required',
        ]);
        $barang = Barang::findorfail($id);
        $barang->update($request->all());
        return redirect('/barang')->with('success', 'Data Berhasil Diubah!');
    }

    public function destroy($id)
    {
        $barang = Barang::findorfail($id);
        $barang->delete();
        return back()->with('success', 'Data Berhasil Dihapus!');
    }
}
