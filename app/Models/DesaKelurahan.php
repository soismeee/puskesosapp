<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DesaKelurahan extends Model
{
    use HasFactory;

    protected $guarded = ['dk_id'];
    
    protected $primaryKey = 'dk_id';
    public $incrementing = false;

    public function kecamatan(){
        return $this->belongsTo(Kecamatan::class, 'kec_id');
    }
}
