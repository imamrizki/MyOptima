<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rab extends Model
{
    protected $table    = 'tb_rab';
    protected $fillable = [
        'project_id', 
        'biaya', 
        'document', 
        'dt_target', 
        'add_by', 
        'edit_by', 
        'status',
        'keterangan',
    ];

}
