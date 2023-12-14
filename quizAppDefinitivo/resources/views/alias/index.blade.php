@extends('preguntas.index')

@section('content')
    <form method="post" action="{{ url('alias') }}">
        @csrf
        @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
    
        
        <div class="mb-3">
            <label for="nombre" class="form-label">Alias:</label>
            <input type="text" class="form-control" id="nombre" name="nombre" value="{{ session('nombre') }}">
        </div>
        <button type="submit" class="btn btn-primary">Guardar Alias</button>
    </form>
@endsection