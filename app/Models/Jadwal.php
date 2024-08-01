<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jadwal extends Model
{
    use HasFactory;

    public $incrementing = false;

    protected $fillable = [
        'id',
        'speedboat_id',
        'pel_asal',
        'pel_tujuan',
        'tgl_berangkat',
        'jam_brgkt',
        'jam_tiba',
        'tiket_tersedia'
    ];

    public function speedboat() {
        return $this->belongsTo('App\Models\Speedboat','speedboat_id','id');

    }

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            // Mengambil semua record dan mengurutkan berdasarkan bagian numerik dari id
            $lastRecord = static::all()->sortByDesc(function($item) {
                return (int) str_replace('JDWL-', '', $item->id);
            })->first();

            // Jika ada data, ambil bagian angka dari ID terakhir, tambahkan 1 dan buat ID baru
            if ($lastRecord) {
                $lastId = (int) str_replace('JDWL-', '', $lastRecord->id);
                $model->id = 'JDWL-' . ($lastId + 1);
            } else {
                // Jika tidak ada data, mulai dari 1
                $model->id = 'JDWL-1';
            }
        });
    }

}
