<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contrato extends Model
{
    use HasFactory;

    public function administrador(){
        return $this->belongsTo(Administrador::class);
    }
    public function cliente(){
        return $this->belongsTo(Cliente::class);
    }
    public function establecimiento(){
        return $this->belongsTo(Establecimiento::class);
    }
}
