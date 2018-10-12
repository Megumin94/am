<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Am extends Model
{
    protected $table = 'ams';

    public function transaksi()
    {
        return $this->hasMany('\App\Models\transaksi', 'id_Am', 'id');
    }

    protected $fillable = [
        'nama_Am', 'no_Hp_Am', 'email', 'status',
    ];
    protected $hidden = ['id'];
    public $timestamps = false;
}
