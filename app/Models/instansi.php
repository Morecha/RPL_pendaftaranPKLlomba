<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class instansi extends Model
{
    use HasFactory;
    protected $table = 'instansis';
    protected static $ignoreChangedAttributes = ['update_at'];
    protected $fillable = [
        'id',
        'id_user',
        'nama_perusahaan',
        'tanggal_masuk',
        'tanggal_selesai',
        'nama_direktur',
        'alamat_kantor',
        'status'
    ];
}
