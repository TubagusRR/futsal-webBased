<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class datalapangan extends Model
{
    protected $fillable = [
        "kd_lapangan", "nama_lapangan","jenis_lapangan","harga"
];
}
