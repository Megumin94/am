<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class pelanggan extends Model
{
    protected $table = 'pelanggan';

    public function transaksi()
    {
        return $this->hasMany('\App\Models\transaksi', 'id_Pelanggan', 'id');
    }

    protected $fillable = [
        'nama_Pelanggan',
        'nama_Cp',
        'no_Hp',
        'no_Telepon',
        'alamat_Pelanggan'
    ];
    protected $hidden = ['id'];
    public $timestamps = false;
}
