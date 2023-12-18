<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StatusKegiatan extends Model
{
    use HasFactory;
    protected $table = 'status_kegiatan';
    protected $primaryKey = 'id_status_kegiatan';
    public $timestamps = true;
    protected $fillable = [
        'nama_status_kegiatan'
    ];
}
