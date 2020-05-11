<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class transaksi extends Model
{
    protected $fillable=[
        'kd_booking', 'waktu', 'nama', 'lapangan', 'harga', 'lama_sewa', 'total', 'bayar', 'kembalian'
    ];
}
