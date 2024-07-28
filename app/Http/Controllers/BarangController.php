<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Barang;
use App\Models\BarangMasuk;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BarangController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        if (!$user) {
            return redirect()->route('login');
        }

        $barangs = Barang::all()->map(function($barang) {
            $barangMasuk = BarangMasuk::where('id_barang', $barang->id_barang)->sum('jml_masuk');
            $barang->jml_masuk = $barangMasuk;
            return $barang;
        });

        $data = [
            'level' => $user,
            'barangs' => $barangs,
        ];

        return view('barang.barangList', $data);
    }

    public function create()
    {
        $level = Auth::user();

        return view('barang.barangForm', compact('level'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'nama_barang' => 'required|string|max:255',
        ]);

        $barang = Barang::create($data);

        return redirect()->route('barang.index')->with('sukses', 'Barang berhasil ditambahkan');
    }

    public function edit($id)
    {
        $barang = Barang::find($id);
        $level = Auth::user();

        return view('barang.barangForm', compact('barang', 'level'));
    }

    public function update(Request $request, $id)
    {
        $data = $request->validate([
            'nama_barang' => 'required|string|max:255',
        ]);

        $barang = Barang::find($id);
        $barang->update($data);

        return redirect()->route('barang.index')->with('sukses', 'Update id Barang '.$id.' Berhasil');
    }

    // Uncomment if you want to add delete functionality
    // public function confirmDelete($id)
    // {
    //     $level = Auth::user();
    //     return view('barang.confirm_delete', compact('id', 'level'));
    // }

    // public function destroy($id)
    // {
    //     Barang::destroy($id);
    //     return redirect()->route('barang.index');
    // }
}
