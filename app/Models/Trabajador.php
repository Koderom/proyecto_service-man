<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Trabajador extends Model
{
    use HasFactory;

    public function persona(){
        return $this->belongsTo(Persona::class);
    }
    public function turno(){
        return $this->belongsTo(Turno::class);
    }
    public function notaServicio(){
        return $this->belongsTo(NotaServicio::class);
    }
    public function ordenTrabajo(){
        return $this->hasMany(OrdenTrabajo::class);
    }
}
