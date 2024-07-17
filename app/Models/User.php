<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;
    public $incrementing = false;
    protected $fillable = [
        'name',
        'email',
        'no_telp',
        'password',
        'role',
    ];

    protected $hidden = [
        'password',
    ];

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            // Mengambil data terakhir yang diinput berdasarkan kolom id
            $lastRecord = static::latest('id')->first();

            // Jika ada data, ambil bagian angka dari ID terakhir, tambahkan 1 dan buat ID baru
            if ($lastRecord) {
                $lastId = (int) str_replace('USER-', '', $lastRecord->id);
                $model->id = 'USER-' . ($lastId + 1);
            } else {
                // Jika tidak ada data, mulai dari 1
                $model->id = 'USER-1';
            }
        });
    }
}
