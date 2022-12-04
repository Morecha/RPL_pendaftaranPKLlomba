<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class pengajuan extends Model
{
    use HasFactory;

    protected $table = 'pengajuans';
    protected static $ignoreChangedAttributes = ['update_at'];
    protected $fillable = [
        'id_user',
        'pembimbing',
        'awal_pelaksanaan',
        'akhir_pelaksanaan',
        'tahap',
        'status'
    ];
}
