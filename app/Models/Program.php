<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Program extends Model
{
    use HasFactory;
    protected $table = 'program';
    protected $primaryKey = 'id_program';
    protected $fillable = [
        'nama_program',
        'gambar_program',
        'keterangan_program',
        'slug_program',
    ];
}
