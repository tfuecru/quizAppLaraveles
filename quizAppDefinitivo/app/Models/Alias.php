<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Alias extends Model
{
    use HasFactory;
    
     protected $table = 'alias';
    
    protected $fillable = ['nombre'];
    
}
