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
            // Mengambil data terakhir yang diinput berdasarkan kolom id
            $lastRecord = static::latest('id')->first();

            // Jika ada data, ambil bagian angka dari ID terakhir, tambahkan 1 dan buat ID baru
            if ($lastRecord) {
                $lastId = (int) str_replace('SPD-', '', $lastRecord->id);
                $model->id = 'SPD-' . ($lastId + 1);
            } else {
                // Jika tidak ada data, mulai dari 1
                $model->id = 'SPD-1';
            }
        });
    }
}
