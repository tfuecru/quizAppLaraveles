<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Models\Pregunta;
use App\Models\Respuesta;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller {
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        $preguntas = Pregunta::all();
        //$respuestas = Respuesta::all();
        return view('admin.index', ['preguntas' => $preguntas,
                                     'respuestas' => null]); //1 consulta: all, 1 consulta por cada fila
    }
    
    function index2() {
        $sql = 'select p.*, r.id rid, r.respuesta, r.escorrecta
                from pregunta p
                left join respuesta r
                on p.id = r.idpregunta
                order by p.id, r.id;';
        $rows = DB::select($sql);
        return view('admin.index2', ['preguntas' => $rows]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() {
        return view('admin.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request) {
        // Crea la pregunta
        $pregunta = Pregunta::create([
            'pregunta' => $request->pregunta,
        ]);

        // Crea las respuestas
        foreach ($request->respuestas as $key => $respuesta) {
            Respuesta::create([
                'idpregunta' => $pregunta->id,
                'respuesta' => $respuesta,
                'escorrecta' => $key == $request->correcta,
            ]);
        }

        return redirect('admin')->with('success', 'Pregunta y respuestas guardadas correctamente.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Admin  $admin
     * @return \Illuminate\Http\Response
     */
    public function show(Admin $admin)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Admin  $admin
     * @return \Illuminate\Http\Response
     */
    public function edit($id) {
        $pregunta = Pregunta::find($id);
        $respuestas = Respuesta::where('idpregunta', $id)->get();
    
        return view('admin.edit', ['pregunta' => $pregunta,
                                    'respuestas' => $respuestas]);
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Admin  $admin
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id) {
        $pregunta = Pregunta::find($id);
    
        $pregunta->update([
            'pregunta' => $request->pregunta,
        ]);
    
        // Eliminar respuestas antiguas
        Respuesta::where('idpregunta', $id)->delete();
    
        foreach ($request->respuestas as $key => $respuestaTexto) {
            $escorrecta = $key == $request->correcta;
    
            // Crear nuevas respuestas
            Respuesta::create([
                'idpregunta' => $id,
                'respuesta' => $respuestaTexto,
                'escorrecta' => $escorrecta,
            ]);
        }
    
        return redirect('admin')->with('success', 'Pregunta actualizada correctamente.');
    }




    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Admin  $admin
     * @return \Illuminate\Http\Response
     */
    public function destroy($id) {
        Pregunta::destroy($id);
    
        return redirect()->back()->with('success', 'Pregunta eliminada correctamente.');
    }
}
