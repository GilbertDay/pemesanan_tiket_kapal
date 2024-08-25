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
        'bukti_bayar'
    ];


    // public function penumpang() {
    //     return $this->belongsTo('App\Models\Penumpang','penumpang_id','id');
    // }
    public function user() {
        return $this->belongsTo('App\Models\User','user_id','id');
    }
    public function penumpang() {
        return $this->belongsTo('App\Models\Penumpang','penumpang_id','id');
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
            // Mengambil semua record dan mengurutkan berdasarkan bagian numerik dari id
            $lastRecord = static::all()->sortByDesc(function($item) {
                return (int) str_replace('TRX-', '', $item->id);
            })->first();

            // Jika ada data, ambil bagian angka dari ID terakhir, tambahkan 1 dan buat ID baru
            if ($lastRecord) {
                $lastId = (int) str_replace('TRX-', '', $lastRecord->id);
                $model->id = 'TRX-' . ($lastId + 1);
            } else {
                // Jika tidak ada data, mulai dari 1
                $model->id = 'TRX-1';
            }
        });
    }
}
