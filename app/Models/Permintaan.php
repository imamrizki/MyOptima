<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Permintaan extends Model
{
    use HasFactory;

    protected $table    = 'tb_permintaan';
    protected $fillable = [
        'tematik_id', 
        'tanggal_permintaan', 
        'reff_permintaan', 
        'nama_permintaan', 
        'pic_permintaan', 
        'keterangan', 
        'add_by', 
        'edit_by', 
        'status'
    ];
}
