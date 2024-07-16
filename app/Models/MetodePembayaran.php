<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MetodePembayaran extends Model
{
    use HasFactory;

    public $incrementing = false;
    protected $fillable = [
        'nama_bank',
        'no_rek',
        'nama_rekening',
        'img'
    ];

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            // Mengambil data terakhir yang diinput berdasarkan kolom id
            $lastRecord = static::latest('id')->first();

            // Jika ada data, ambil bagian angka dari ID terakhir, tambahkan 1 dan buat ID baru
            if ($lastRecord) {
                $lastId = (int) str_replace('BANK-', '', $lastRecord->id);
                $model->id = 'BANK-' . ($lastId + 1);
            } else {
                // Jika tidak ada data, mulai dari 1
                $model->id = 'BANK-1';
            }
        });
    }
}
