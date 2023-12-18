<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UnitBisnis extends Model
{
    use HasFactory;
    protected $table = 'unit_bisnis';
    protected $primaryKey = 'id_unit_bisnis';
    protected $fillable = [
        'nama_unit_bisnis',
        'deskripsi_unit_bisnis',
        'logo_unit_bisnis',
        'url_unit_bisnis',
    ];
}
