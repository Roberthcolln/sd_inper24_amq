<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Diskon extends Model
{
    use HasFactory;
    protected $table = 'diskon';
    protected $primaryKey = 'id_diskon';
    protected $fillable = [
        'nama_diskon',
        'gambar_diskon',
        'keterangan_diskon',
        'slug_diskon',
    ];
}
