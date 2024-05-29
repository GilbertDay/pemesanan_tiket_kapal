<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaksi extends Model
{
    use HasFactory;
    public $incrementing = false;
    protected $fillable = [
        'user_id',
        'penumpang_id',
        'jadwal_id',
        'biaya_penanganan',
        'status',
        'jenis_layanan',
        'jumlah_kursi',
        'harga',
        'diskon',
        'total',
    ];

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            $count = static::count(); // Mengambil jumlah data di database
            $model->id = 'TRX-' . ($count + 1); // Menambahkan 1 ke jumlah data untuk membuat ID baru
        });
    }
}
