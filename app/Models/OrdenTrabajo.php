<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrdenTrabajo extends Model
{
    use HasFactory;

    public function trabajador(){
        return $this->belongsTo(Trabajador::class);
    }
    public function solicitudServicio(){
        return $this->belongsTo(SolicitudServicio::class);
    }
    public function notaServicio(){
        return $this->hasOne(NotaServicio::class);
    }
}
