<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pengajuan extends Model
{
    use HasFactory;

    protected $guarded = ['pengajuan_id'];

    protected $primaryKey = 'pengajuan_id';
    public $incrementing = false;

    public function jenis_layanan()
    {
        return $this->belongsTo(JenisLayanan::class, 'jl_id');
    }

    public function penduduk()
    {
        return $this->belongsTo(Penduduk::class, 'penduduk_nik');
    }

    public function berkas_pengajuan()
    {
        return $this->hasMany(BerkasPengajuan::class, 'pengajuan_id');
    }
}
