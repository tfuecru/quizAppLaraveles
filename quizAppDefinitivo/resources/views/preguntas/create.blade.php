@extends('preguntas.index')

@section('content1')
    / Questions
@endsection

@section('content')
   <div class="card-body">

                    <form method="post" action="{{ url('preguntas/resultados') }}">
                        @csrf
                                <div class="card-body">
                                    @foreach($preguntas as $pregunta)
                                        <div class="card @if(!$loop->last)mb-3 @endif">
                                            <div class="card-header">{{ $pregunta->pregunta }}</div>
                                            
                                            <div class="card-body">
                                                <input type="hidden" name="pregunta[{{ $pregunta->id }}]" value="">
                                                
                                                @foreach($respuestas->where('idpregunta', $pregunta->id) as $respuesta)
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="radio" name="pregunta[{{ $pregunta->id }}]" id="respuesta-{{ $respuesta->id }}" value="{{ $respuesta->id }}" @if(old("preguntas.$pregunta->id") == $respuesta->id) checked @endif>
                                                        <label class="form-check-label" for="respuesta-{{ $respuesta->id }}">
                                                            {{ $respuesta->respuesta }}
                                                        </label>
                                                    </div>
                                                @endforeach
                                            </div>
                                        </div>
                                    @endforeach


                        <div class="form-group row mb-0">
                            <div class="col-md-6">
                                <button type="submit" class="btn btn-primary">
                                    Submit
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
    </div>
@endsection

