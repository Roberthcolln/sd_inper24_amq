<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubKategoriKegiatan extends Model
{
    use HasFactory;
    protected $table = 'sub_kategori_kegiatan';
    protected $primaryKey = 'id_sub_kategori_kegiatan';
    public $timestamps = true;
    protected $fillable = [
        'id_kategori_kegiatan',
        'nama_sub_kategori_kegiatan'
    ];
}
