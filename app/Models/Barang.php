<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Barang extends Model
{
    protected $table = 'barang';
    protected $primaryKey = 'id_barang';
    public $timestamps = false;

    protected $fillable = [
        'nama_barang'
    ];

    public function getBarangByName($nama)
    {
        return self::where('nama_barang', $nama)->first();
    }

    public static function getBarangUpdate($id)
    {
        return self::find($id);
    }
}
