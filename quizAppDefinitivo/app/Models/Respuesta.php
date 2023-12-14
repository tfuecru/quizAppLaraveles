<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Respuesta extends Model
{
    use HasFactory;
    
    protected $table = 'respuesta';
    
    protected $fillable = ['idpregunta', 'respuesta', 'escorrecta'];
    
    function pregunta() {
        return $this->belongsTo('App\Models\Pregunta', 'idpregunta');
    }
}
