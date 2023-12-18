<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kelas extends Model
{
    use HasFactory;
    protected $table = 'kelas';
    protected $primaryKey = 'id_kelas';
    public $timestamps = true;
    protected $fillable = [
        'nama_kelas',
        'deskripsi_kelas',
        'id_guru',
        'gambar_kelas',
        'jumlah_siswa',
        'slug_kelas'
    ];
}
