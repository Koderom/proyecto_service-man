<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Establecimiento extends Model
{
    use HasFactory;

    public function contrato(){
        return $this->hasOne(Contrato::class);
    }
    public function solicitudServicio(){
        return $this->hasMany(SolicitudServicio::class);
    }
}
