<?php

namespace App\Http\Controllers;

use App\Models\Alias;
use App\Models\Preguntas;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class AliasController extends Controller {
    
    public function index() {
        return view('alias.index');
    }

   public function store(Request $request) {
    $request->validate([
        'nombre' => 'required|string|max:60',
    ]);


    // Guardar en la sesión
    session(['nombre' => $request->input('nombre')]);

    return redirect()->back()->with(['success', 'Alias guardado exitosamente.']);
}
    
}
