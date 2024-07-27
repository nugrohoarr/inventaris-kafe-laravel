<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BarangMasuk extends Model
{
    protected $table = 'barang_masuk';
    protected $primaryKey = 'id_masuk';
    public $timestamps = false;

    protected $fillable = [
        'id_barang',
        'tgl_masuk',
        'spesifikasi',
        'kondisi',
        'jml_masuk'
    ];

    public function barang()
    {
        return $this->belongsTo(Barang::class, 'id_barang', 'id_barang');
    }

    public static function getBarangMasukUpdate($id)
    {
        return self::with('barang')->find($id);
    }
}
