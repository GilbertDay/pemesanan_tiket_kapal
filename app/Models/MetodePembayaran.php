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
            $count = static::count(); // Mengambil jumlah data di database
            $model->id = 'BANK-' . ($count + 1); // Menambahkan 1 ke jumlah data untuk membuat ID baru
        });
    }
}
