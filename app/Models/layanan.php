<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class layanan extends Model
{
    protected $table = 'layanan';

    public function transaksi()
    {
        return $this->hasMany('\App\Models\transaksi', 'id_Layanan', 'id');
    }

    protected $fillable = [
        'nama_Produk',
        'daerah_Instalasi',
        'satuan_Quantity',
        'nominal_Harga',
        'payterm',
        'abonemen',
        'akhir_Kontrak',
        'biaya',
        'mitra'
    ];
    protected $hidden = ['id'];
    public $timestamps = false;
}
