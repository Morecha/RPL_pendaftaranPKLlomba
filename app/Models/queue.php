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
        'nama_lomba',
        'tanggal_pelaksanaan',
        'jenjang_pelaksanaan',
        'id_user',
        'status',
        'rank',
        'data'
    ];
}
