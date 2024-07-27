<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\BarangMasuk;
use App\Models\Barang;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class BarangMasukController extends Controller
{
    // Display a listing of the resource.
    public function index()
    {   
        $users = User::all();
        $level = Auth::user();
        $barang_masuk = BarangMasuk::with('barang')->get(); 
        return view('barang_masuk.barangMasukList', compact('barang_masuk', 'users', 'level'));
    }

    // Show the form for creating a new resource.
    public function create()
    {
        $level = Auth::user();
        $nama_barang = Barang::all(); // Get all barang for the dropdown
        return view('barang_masuk.barangMasukForm', compact('nama_barang', 'level'));
    }

    // Store a newly created resource in storage.
    public function store(Request $request)
    {
        $level = Auth::user();

        $request->validate([
            'id_barang' => 'required|exists:barangs,id_barang',
            'jml_masuk' => 'required|integer',
            'spesifikasi' => 'nullable|string',
            'kondisi' => 'nullable|string',
        ]);

        BarangMasuk::create([
            'id_barang' => $request->input('id_barang'),
            'jml_masuk' => $request->input('jml_masuk'),
            'spesifikasi' => $request->input('spesifikasi'),
            'kondisi' => $request->input('kondisi'),
            'tgl_masuk' => now(),
        ]);

        return redirect()->route('barang_masuk.barangMasukForm', compact('level'))->with('sukses', 'Barang masuk berhasil ditambahkan!');
    }

    // Display the specified resource.
    public function show($id)
    {
        $level = Auth::user();
        $barang_masuk = BarangMasuk::with('barang')->findOrFail($id);
        return view('barang_masuk.barangMasukDetail', compact('barang_masuk', 'level'));
    }

    // Show the form for editing the specified resource.
    public function edit($id)
    {
        $level = Auth::user();
        $barang_masukId = BarangMasuk::findOrFail($id);
        $nama_barang = Barang::all();
        return view('barang_masuk.barangMasukForm', compact('barang_masukId', 'nama_barang', 'level'));
    }

    // Update the specified resource in storage.
    public function update(Request $request, $id)
    {
        $request->validate([
            'id_barang' => 'required|exists:barangs,id_barang',
            'jml_masuk' => 'required|integer',
            'spesifikasi' => 'nullable|string',
            'kondisi' => 'nullable|string',
        ]);

        $barang_masuk = BarangMasuk::findOrFail($id);
        $barang_masuk->update([
            'id_barang' => $request->input('id_barang'),
            'jml_masuk' => $request->input('jml_masuk'),
            'spesifikasi' => $request->input('spesifikasi'),
            'kondisi' => $request->input('kondisi'),
        ]);

        return redirect()->route('barang_masuk.index')->with('sukses', 'Barang masuk berhasil diperbarui!');
    }

    // Remove the specified resource from storage.
    public function destroy($id)
    {
        $barang_masuk = BarangMasuk::findOrFail($id);
        $barang_masuk->delete();

        return redirect()->route('barang_masuk.index')->with('sukses', 'Barang masuk berhasil dihapus!');
    }
}
