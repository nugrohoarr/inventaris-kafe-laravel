<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Barang;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BarangController extends Controller
{
    public function index()
    {
        $users = User::all();
        $level = Auth::user();
        $barangs = Barang::all();

        return view('barang.barangList', compact('barangs','users', 'level'));
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

        Barang::create($data);

        $barangId = Barang::where('nama_barang', $data['nama_barang'])->first();
        return view('barang.barangForm', compact('barangId', 'level'));
    }

    public function edit($id)
    {
        $barangId = Barang::find($id);
        $level = Auth::user();

        return view('barang.barangForm', compact('barangId', 'level'));
    }

    public function update(Request $request, $id)
    {
        $data = $request->validate([
            'nama_barang' => 'required|string|max:255',
        ]);

        $barang = Barang::find($id);
        $barang->update($data);

        $level = Auth::user()->level; // Adjust this based on your level retrieval logic
        return view('barang.barangForm', compact('barang', 'level'))
               ->with('sukses', 'Update id Barang '.$id.' Berhasil');
    }

    // Uncomment if you want to add delete functionality
    // public function confirmDelete($id)
    // {
    //     $level = Auth::user()->level; // Adjust this based on your level retrieval logic
    //     return view('barang.confirm_delete', compact('id', 'level'));
    // }

    // public function destroy($id)
    // {
    //     Barang::destroy($id);
    //     return redirect()->route('barang.index');
    // }
}
