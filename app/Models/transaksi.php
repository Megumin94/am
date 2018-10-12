<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class transaksi extends Model
{
    protected $table = 'transaksi';

    public function Am()
    {
        return $this->belongsTo('\App\Models\Am', 'id_Am');
    }

    public function layanan()
    {
        return $this->belongsTo('\App\Models\layanan', 'id_Layanan');
    }

    public function pelanggan()
    {
        return $this->belongsTo('\App\Models\pelanggan', 'id_Pelanggan');
    }

    protected $fillable = [
        'id_Am',
        'id_Pelanggan',
        'id_Layanan',
        'tgl_Kfs',
        'tgl_Baso',
        'tgl_Kontrak',
        'status_Projek',
        'nilai',
    ];

    protected $hidden = [
        'id'
    ];

    public $timestamps = false;
}
