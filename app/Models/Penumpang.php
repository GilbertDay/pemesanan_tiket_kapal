<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Penumpang extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'nama',
        'nama_instansi',
        'jenis_kelamin',
        'alamat',
        'no_telp',
        'no_telp_darurat',
    ];
}
