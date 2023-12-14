<?php

namespace App\Http\Controllers;

use App\Models\Pregunta;
use App\Models\Respuesta;
use Illuminate\Http\Request;

class PreguntaController extends Controller {
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        return view('preguntas.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() {
        $preguntas = Pregunta::inRandomOrder()->take(10)->get();
        $respuestas = Respuesta::all();
        //dd($preguntas);
        return view('preguntas.create', ['preguntas' => $preguntas, 
                                         'respuestas' => $respuestas]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request) {
        $respuestasEnviadas = $request->input('pregunta');

        $aciertos = 0;
        $fallos = 0;
    
        foreach ($respuestasEnviadas as $idPregunta => $idRespuestaEnviada) {
            $respuestaCorrecta = Respuesta::where('idpregunta', $idPregunta)
                ->where('escorrecta', true)
                ->first();
    
            if ($idRespuestaEnviada == $respuestaCorrecta->id) {
                $aciertos++;
            } else {
                $fallos++;
            }
        }
    
        return view('preguntas.resultados', compact('aciertos', 'fallos'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Pregunta  $pregunta
     * @return \Illuminate\Http\Response
     */
    public function show(Pregunta $pregunta)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Pregunta  $pregunta
     * @return \Illuminate\Http\Response
     */
    public function edit(Pregunta $pregunta)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Pregunta  $pregunta
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Pregunta $pregunta)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Pregunta  $pregunta
     * @return \Illuminate\Http\Response
     */
    public function destroy(Pregunta $pregunta)
    {
        //
    }
}
