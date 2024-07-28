<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BarangKeluar extends Model
{
    protected $table = 'barang_keluar';
    protected $primaryKey = 'id_keluar';
    public $timestamps = false;

    protected $fillable = [
        'id_barang',
        'tgl_keluar',
        'jml_keluar',
        'deskripsi'
    ];

    public function barang()
    {
        return $this->belongsTo(Barang::class, 'id_barang', 'id_barang');
    }

    public static function getBarangKeluarUpdate($id)
    {
        return self::with('barang')->find($id);
    }
}
