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
    public function index()
    {   
        $users = User::all();
        $level = Auth::user();
        $barang_masuk = BarangMasuk::with('barang')->get(); 
        return view('barang_masuk.barangMasukList', compact('barang_masuk', 'users', 'level'));
    }

    public function create()
    {
        $level = Auth::user();
        $nama_barang = Barang::all(); // Get all barang for the dropdown
        return view('barang_masuk.barangMasukForm', compact('nama_barang', 'level'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'id_barang' => 'required|exists:barang,id_barang',
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

        return redirect()->route('barang-masuk.create')->with('sukses', 'Barang masuk berhasil ditambahkan!');
    }

    public function show($id)
    {
        $level = Auth::user();
        $barang_masuk = BarangMasuk::with('barang')->findOrFail($id);
        return view('barang_masuk.barangMasukDetail', compact('barang_masuk', 'level'));
    }

    public function edit($id)
    {
        $level = Auth::user();
        $barang_masukId = BarangMasuk::findOrFail($id);
        $nama_barang = Barang::all();
        return view('barang_masuk.barangMasukForm', compact('barang_masukId', 'nama_barang', 'level'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'id_barang' => 'required|exists:barang,id_barang',
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

        return redirect()->route('barang-masuk.edit', $barang_masuk->id_masuk)->with('sukses', 'Barang masuk berhasil diperbarui!');
    }

    public function destroy($id)
    {
        $barang_masuk = BarangMasuk::findOrFail($id);
        $barang_masuk->delete();

        return redirect()->route('barang-masuk.index')->with('sukses', 'Barang masuk berhasil dihapus!');
    }
}
