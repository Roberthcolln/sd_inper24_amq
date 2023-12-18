<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KategoriKegiatan extends Model
{
    use HasFactory;
    protected $table = 'kategori_kegiatan';
    protected $primaryKey = 'id_kategori_kegiatan';
    public $timestamps = true;
    protected $fillable = [
        'nama_kategori_kegiatan'
    ];
}
