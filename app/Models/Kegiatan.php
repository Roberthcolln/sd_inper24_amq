<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kegiatan extends Model
{
    use HasFactory;
    protected $table = 'kegiatan';
    protected $primaryKey = 'id_kegiatan';
    public $timestamps = true;
    protected $fillable = [
        'id_kategori_kegiatan',
        'id_sub_kategori_kegiatan',
        'nama_kegiatan',
        'deskripsi_kegiatan',
        'tempat_kegiatan',
        'gambar_kegiatan',
        'tanggal_kegiatan',
        'jam_kegiatan',
        'biaya_kegiatan',
        'id_status_kegiatan',
        'id_publish_kegiatan',
        'slug_kegiatan'
    ];
}
