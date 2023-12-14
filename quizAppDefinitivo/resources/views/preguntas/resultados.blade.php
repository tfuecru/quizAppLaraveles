@extends('preguntas.index')

@section('content1')
    / Questions
@endsection

@section('content')


<h1>Resultados</h1>
<p>Aciertos: {{ $aciertos }}</p>
<p>Fallos: {{ $fallos }}</p>

<div style="display: inline;">
<a class="btn btn-danger" href='{{ url('preguntas/create') }}'>Volver a jugar</a>
<a class="btn btn-dark" href='{{ url('preguntas') }}'>Volver al inicio</a>
</div>

@endsection