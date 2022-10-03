<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    use HasFactory;

    public function persona(){
        return $this->belongsTo(Persona::class);
    }
    public function contrato(){
        return $this->hasMany(Contrato::class);
    }
    public function solicitudServicio(){
        return $this->hasMany(SolicitudServicio::class);
    }
    public function notaServicio(){
        return $this->hasMany(NotaServicio::class);
    }
}
