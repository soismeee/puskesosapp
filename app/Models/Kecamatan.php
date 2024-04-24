<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kecamatan extends Model
{
    use HasFactory;

    protected $guarded = ['kec_id'];
    
    protected $primaryKey = 'kec_id';
    public $incrementing = false;
}
