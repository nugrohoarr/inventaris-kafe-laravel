<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\BarangKeluar;
use App\Models\Barang;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class BarangKeluarController extends Controller
{
    // Menampilkan daftar barang keluar
    public function index()
    {
        $users = User::all();
        $level = Auth::user();
        $barang_keluar = BarangKeluar::with('barang')->get();
        return view('barang_keluar.barangKeluarList', compact('barang_keluar', 'users', 'level'));
    }

    // Menampilkan form untuk menambah barang keluar
    public function create()
    {
        $level = Auth::user();
        $nama_barang = Barang::all();
        return view('barang_keluar.barangKeluarForm', compact('nama_barang', 'level'));
    }

    // Menyimpan barang keluar baru
    public function store(Request $request)
    {
        $request->validate([
            'id_barang' => 'required|exists:barang,id_barang',
            'jml_keluar' => 'required|numeric',
            'deskripsi' => 'nullable|string',
        ]);

        BarangKeluar::create($request->all());

        return redirect()->route('barang-keluar.index')->with('sukses', 'Barang Keluar berhasil ditambahkan');
    }

    // Menampilkan form untuk mengedit barang keluar
    public function edit($id)
    {
        $level = Auth::user();
        $barang_keluarId = BarangKeluar::findOrFail($id);
        $nama_barang = Barang::all();
        return view('barang_keluar.barangKeluarForm', compact('barang_keluarId', 'nama_barang', 'level'));
    }

    // Mengupdate barang keluar
    public function update(Request $request, $id)
    {
        $request->validate([
            'id_barang' => 'required|exists:barang,id_barang',
            'jml_keluar' => 'required|numeric',
            'deskripsi' => 'nullable|string',
        ]);

        $barang_keluar = BarangKeluar::findOrFail($id);
        $barang_keluar->update($request->all());

        return redirect()->route('barang-keluar.index')->with('sukses', 'Barang Keluar berhasil diperbarui');
    }

    // Menghapus barang keluar
    public function destroy($id)
    {
        $barang_keluar = BarangKeluar::findOrFail($id);
        $barang_keluar->delete();

        return redirect()->route('barang-keluar.index')->with('sukses', 'Barang Keluar berhasil dihapus');
    }
}
