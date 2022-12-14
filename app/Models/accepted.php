<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class accepted extends Model
{
    use HasFactory;
    protected $table = 'accepteds';
    protected static $ignoreChangedAttributes = ['update_at'];
    protected $fillable = [
        'id',
        'id_user',
        'nilai_pengganti',
        'file'
    ];
}
