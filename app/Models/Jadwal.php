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
    ];

    public function speedboat() {
        return $this->belongsTo('App\Models\Speedboat','speedboat_id','id');
    }

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            $count = static::count(); // Mengambil jumlah data di database
            $model->id = 'JDWL-' . ($count + 1); // Menambahkan 1 ke jumlah data untuk membuat ID baru
        });
    }
}
