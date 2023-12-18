<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Iventaris extends Model
{
    use HasFactory;
    protected $table = 'iventaris';
    protected $primaryKey = 'id_iventaris';
    protected $fillable = [
        'nama_iventaris',
        'gambar_iventaris',
        'jumlah_iventaris',
        'kondisi_iventaris',
        'slug_iventaris',
    ];
}
