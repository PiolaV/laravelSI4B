<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Prodi extends Model
{
    use HasFactory;

    public function fakultas(){
        return $this->belongsTo(Fakultas::class, 'fakultas_id');
         //  return $this->belongsTo(nama_model ::class, 'foreign_key');
        // 1 prodi 1 fakultas belongsto
        // i fakultas 1 prodi hasmany
    }
}
