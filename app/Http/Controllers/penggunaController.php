<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class penggunaController extends Controller
{
    public function index()
    {
        $pengguna = User::where('level', 'User')->paginate(10);
        return view('pengguna.index', [
            'title' => 'Pengguna',
            'pengguna' => $pengguna
        ]);
    }

    public function cetakuser()
    {
        $pengguna = User::where('level', 'User')->paginate(10);
        return view('pengguna.cetak-user', compact('pengguna'));
    }

    public function create()
    {
        return view('pengguna.create-user', ['title' => 'Create Pengguna']);
    }

    public function store(Request $request)
    {
        $credentials = $request->validate([
            'NIM' => 'required|max:8',
            'tahun' => 'required|max:4',
            'prodi' => 'required',
            'name' => 'required',
            'nomorhp' => 'required|max:13',
            'email' => 'required|email:dns',
            'password' => 'required|min:8|max:10',
        ]);
        User::create([
            'status' => 'Mahasiswa',
            'nim' => $request->NIM,
            'tahun' => $request->tahun,
            'prodi' => $request->prodi,
            'name' => $request->name,
            'level' => 'user',
            'email' => $request->email,
            'nomorhp' => $request->nomorhp,
            'password' => bcrypt($request->password),
        ]);
        return redirect('/pengguna')->with('success', 'Data Berhasil Ditambahkan!');
    }

    public function edit($id)
    {
        $pengguna = User::findorfail($id);
        return view('pengguna.edit-user', [
            'pengguna' => $pengguna,
            'title' => 'Edit Penguna',
        ]);
    }

    public function update(Request $request, $id)
    {
        $credentials = $request->validate([
            'NIM' => 'required|max:8',
            'tahun' => 'required|max:4',
            'prodi' => 'required',
            'name' => 'required',
            'nomorhp' => 'required|max:13',
            'email' => 'required|email:dns',
        ]);
        $pengguna = User::findorfail($id);
        $pengguna->update($request->all());
        return redirect('/pengguna')->with('success', 'Data Berhasil Diubah!');
    }

    public function destroy($id)
    {
        $pengguna = User::findorfail($id);
        $pengguna->delete();
        return back()->with('success', 'Data Berhasil Dihapus!');
    }

    public function updateStatus($user_id, $status_code)
    {
        try {
            $update_user = User::whereId($user_id)->update([
                'status' => $status_code
            ]);
            if ($update_user) {
                return redirect('/pengguna')->with('success', 'User Status Updated Successfully. ');
            }
            return redirect('/pengguna')->with('error', 'Fail to update user status. ');
        } catch (\Throwable $th) {
        }
    }
}
