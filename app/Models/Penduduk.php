<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Penduduk extends Model
{
    use HasFactory;

    protected $guarded = ['nik'];

    protected $primaryKey = 'nik';
    public $incrementing = false;

    public function kecamatan()
    {
        return $this->belongsTo(Kecamatan::class, 'kec_id');
    }

    public function desa_kelurahan()
    {
        return $this->belongsTo(DesaKelurahan::class, 'dk_id');
    }

    public function pengajuan()
    {
        return $this->belongsTo(Pengajuan::class, 'nik');
    }
}
