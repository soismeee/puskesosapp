<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BerkasPengajuan extends Model
{
    use HasFactory;

    protected $guarded = ['berkas_id'];
    
    protected $primaryKey = 'berkas_id';
    public $incrementing = false;

    public function pengajuan(){
        return $this->belongsTo(Pengajuan::class, 'pengajuan_id');
    }
}
