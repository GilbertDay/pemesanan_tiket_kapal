<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Speedboat extends Model
{
    use HasFactory;

    public $incrementing = false;

    protected $fillable = [
        'id',
        'nama_speedboat',
        'kapasitas_kursi',
        'harga',
        'harga_normal',
    ];

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            $count = static::count(); // Mengambil jumlah data di database
            $model->id = 'SPD-' . ($count + 1); // Menambahkan 1 ke jumlah data untuk membuat ID baru
        });
    }
}
