<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PublishKegiatan extends Model
{
    use HasFactory;
    protected $table = 'publish_kegiatan';
    protected $primaryKey = 'id_publish_kegiatan';
    public $timestamps = true;
    protected $fillable = [
        'nama_publish_kegiatan'
    ];
}
