<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Guru extends Model
{
    use HasFactory;
    protected $table = 'guru';
    protected $primaryKey = 'id_guru';
    protected $fillable = [
        'nama_guru',
        'jabatan_guru',
        'jabatan_guru',
        'foto_guru',
        'facebook_guru',
        'instagram_guru',
    ];
}
