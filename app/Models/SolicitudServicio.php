<?php

namespace App\Models;

use GuzzleHttp\Client;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SolicitudServicio extends Model
{
    use HasFactory;

    public function servicio(){
        return $this->belongsTo(Servicio::class);
    }
    public function establecimiento(){
        return $this->belongsTo(Establecimiento::class);
    }
    public function cliente(){
        return $this->belongsTo(Cliente::class);
    }
    public function ordenTrabajo(){
        return $this->hasOne(OrdenTrabajo::class);
    }
}
