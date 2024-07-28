<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Barang;
use App\Models\BarangMasuk;
use App\Models\BarangKeluar;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        if (!$user) {
            return redirect()->route('login');
        }

        $barangs = Barang::all()->map(function($barang) {
            $barangMasuk = BarangMasuk::where('id_barang', $barang->id_barang)->sum('jml_masuk');
            $barangKeluar = BarangKeluar::where('id_barang', $barang->id_barang)->sum('jml_keluar');
            $barang->jml_masuk = $barangMasuk;
            $barang->jml_keluar = $barangKeluar;
            $barang->sisa_stok = $barangMasuk - $barangKeluar;
            return $barang;
        });

        $data = [
            'level' => $user,
            'users' => User::count(),
            'barangs' => $barangs->count(),
            'stoks' => $barangs,
        ];

        return view('dashboard.dashboard', $data);
    }
}
