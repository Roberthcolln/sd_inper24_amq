<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Partner extends Model
{
    use HasFactory;
    protected $table = 'partner';
    protected $primaryKey = 'id_partner';
    protected $fillable = [
        'kategori_partner',
        'nama_partner',
        'gambar_partner',
        'url_partner',
    ];
}
