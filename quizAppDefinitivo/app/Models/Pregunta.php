<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pregunta extends Model
{
    use HasFactory;
    
    protected $table = 'pregunta';
    
    protected $fillable = ['pregunta'];
    
    function respuestas() {
        return $this->hasMany('App\Models\Respuesta', 'idpregunta');
    }
}
