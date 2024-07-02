<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaksi extends Model
{
    use HasFactory;
    public $timestamps = true;
    public $incrementing = false;
    protected $fillable = [
        'user_id',
        'penumpang_id',
        'jadwal_id',
        'metode_pembayaran_id',
        'biaya_penanganan',
        'status',
        'jenis_layanan',
        'jumlah_kursi',
        'harga',
        'diskon',
        'total',
    ];


    // public function penumpang() {
    //     return $this->belongsTo('App\Models\Penumpang','penumpang_id','id');
    // }
    public function user() {
        return $this->belongsTo('App\Models\User','user_id','id');
    }
    public function jadwal() {
        return $this->belongsTo('App\Models\Jadwal','jadwal_id','id');
    }
    public function metodePembayaran() {
        return $this->belongsTo('App\Models\MetodePembayaran','metode_pembayaran_id','id');
    }

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            $count = static::count(); // Mengambil jumlah data di database
            $model->id = 'TRX-' . ($count + 1); // Menambahkan 1 ke jumlah data untuk membuat ID baru
        });
    }
}
