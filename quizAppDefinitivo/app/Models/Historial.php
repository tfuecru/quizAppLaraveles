<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Historial extends Model
{
    use HasFactory;
    
    protected $table = 'historial';
    
    protected $fillable = ['idpregunta', 'idrespuesta', 'alias', 'escorrecta'];
    
    function preguntas() {
        return $this->hasMany('App\Models\Pregunta', 'idpregunta');
    }
    
    function respuestas() {
        return $this->hasMany('App\Models\Respuesta', 'idrespuesta');
    }
}
