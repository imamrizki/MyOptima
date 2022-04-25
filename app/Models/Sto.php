<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sto extends Model
{
    use HasFactory;

    protected $table = 'tb_sto';

    protected $fillable = ['kode_sto', 'nama_sto'];

    public function project()
    {
        return $this->hasMany(Project::class, Sto::class);
    }
}
