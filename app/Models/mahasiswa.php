<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class mahasiswa extends Model
{
    use HasFactory;
    protected $table = 'mahasiswas';
    protected static $ignoreChangedAttributes = ['update_at'];
    protected $fillable = [
        'id',
        'id_user',
        'nama',
        'nim',
        'angkatan',
        'sks'
    ];
}
