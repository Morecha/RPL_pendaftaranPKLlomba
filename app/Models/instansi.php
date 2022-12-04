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
        'URL_medsos',
        'penerima_surat',
        'jabatan',
        'objek',
        'URL_pkl',
        'tanggal_masuk',
        'tanggal_selesai',
        'alamat_kantor',
        'status'
    ];
}
