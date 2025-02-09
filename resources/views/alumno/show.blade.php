@extends('layouts.app')

@section('title', 'Detalles del Alumno')
@section('header', 'Detalles del Alumno')

@section('content')
    <div class="card">
        <div class="card-header">
            Alumno: {{ $alumno->nombre }} {{ $alumno->app }} {{ $alumno->apm }}
        </div>
        <div class="card-body">
            <p><strong>Matrícula:</strong> {{ $alumno->matricula }}</p>
            <p><strong>Nombre:</strong> {{ $alumno->nombre }}</p>
            <p><strong>Apellidos:</strong> {{ $alumno->app }} {{ $alumno->apm }}</p>
            <p><strong>Fecha de Nacimiento:</strong> {{ $alumno->fn }}</p>
            <p><strong>Género:</strong> {{ $alumno->genero == 'M' ? 'Masculino' : 'Femenino' }}</p>
        </div>
        <div class="card-footer">
            <a href="{{ route('alumno.index') }}" class="btn btn-primary">Volver</a>
        </div>
    </div>
@endsection
