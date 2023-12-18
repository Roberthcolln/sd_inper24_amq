<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Siswa extends Model
{
    use HasFactory;
    protected $table = 'siswa';
    protected $primaryKey = 'id_siswa';
    public $timestamps = true;
    protected $fillable = [
        'nama_siswa',
        'nisn_siswa',
        'id_kelas',
        'foto_siswa',
        'alamat_siswa',
        'tanggal_lahir_siswa',
        'tempat_lahir_siswa',
        'jenis_kelamin_siswa',
        'no_hp_siswa',
        'nama_ayah_siswa',
        'nama_ibu_siswa',
        'pekerjaan_ayah_siswa',
        'pekerjaan_ibu_siswa',
        'alamat_ayah_siswa',
        'alamat_ibu_siswa',
        'slug_siswa'
    ];
}
