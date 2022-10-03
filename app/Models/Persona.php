<?php

namespace App\Models;

use GuzzleHttp\Client;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Persona extends Model
{
    use HasFactory;

    public function user(){
        return $this->hasOne(User::class);
    }
    public function cliente(){
        return $this->hasOne(Cliente::class);
    }
    public function administrador(){
        return $this->hasOne(Administrador::class);
    }
    public function trabajador(){
        return $this->hasOne(Trabajador::class);
    }
}
