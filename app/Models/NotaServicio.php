<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NotaServicio extends Model
{
    use HasFactory;
    
    public function cliente(){
        return $this->belongsTo(Cliente::class);
    }
    public function trabajador(){
        return $this->belongsTo(Trabajador::class);
    }
    public function ordenTrabajo(){
        return $this->belongsTo(OrdenTrabajo::class);
    }
}
