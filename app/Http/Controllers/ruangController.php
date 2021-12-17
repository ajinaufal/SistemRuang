<?php

namespace App\Http\Controllers;

use App\Models\Ruang;
use Illuminate\Http\Request;

class ruangController extends Controller
{
    public function index()
    {
        $ruang = Ruang::paginate(10);
        return view('ruang.index', [
            'title' => 'Ruang',
            'ruang' => $ruang,
        ]);
    }

    public function cetakruang()
    {
        $ruang = Ruang::get();
        return view('ruang.cetak-ruang', compact('ruang'));
    }

    public function create()
    {
        $ruang = Ruang::all();
        return view('ruang.create-ruang', [
            'title' => 'Create Ruang',
            'ruang' => $ruang,
        ]);
    }

    public function store(Request $request)
    {
        $credentials = $request->validate([
            'kd_ruang' => 'required',
            'nm_ruang' => 'required',
            'kapasitas' => 'required',
            'fasilitas' => 'required',
        ]);
        Ruang::create([
            'kd_ruang' => $request->kd_ruang,
            'nm_ruang' => $request->nm_ruang,
            'kapasitas' => $request->kapasitas,
            'fasilitas' => $request->fasilitas,
        ]);
        return redirect('/ruang')->with('success', 'Data Berhasil Ditambahkan!');
    }

    public function edit($id)
    {
        $ruang = Ruang::findorfail($id);
        return view('ruang.edit-ruang', [
            'title' => 'Edit Ruang',
            'ruang' => $ruang,
        ]);
    }

    public function update(Request $request, $id)
    {
        $credentials = $request->validate([
            'kd_ruang' => 'required',
            'nm_ruang' => 'required',
            'kapasitas' => 'required',
            'fasilitas' => 'required',
        ]);
        $ruang = Ruang::findorfail($id);
        $ruang->update($request->all());
        return redirect('ruang')->with('success', 'Data Berhasil Diubah!');
    }

    public function destroy($id)
    {
        $ruang = Ruang::findorfail($id);
        $ruang->delete();
        return back()->with('toast_success', 'Data Berhasil Dihapus!');
    }
}
