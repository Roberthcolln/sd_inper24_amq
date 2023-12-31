<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rekening extends Model
{
    use HasFactory;
    protected $table = 'rekening';
    protected $primaryKey = 'id_rekening';
    protected $fillable = [
        'nama_rekening',
        'bank_rekening',
        'no_rekening',
        'logo_rekening',
    ];
}
