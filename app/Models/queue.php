<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class queue extends Model
{
    use HasFactory;
    protected $table = 'queues';
    protected static $ignoreChangedAttributes = ['update_at'];
    protected $fillable = [
        'id',
        'id_pengajuan',
        'nama_lomba',
        'pembimbing',
        'kategori_lomba',
        'penyelenggara',
        'URL_lomba',
        'tempat_lomba',
        'produk_lomba',
        'sumber_dana',
        'tanggal_pelaksanaan',
        'jenjang_pelaksanaan',
        'id_user',
        'status',
        'rank',
        'data',
        'proposal',
    ];
}
