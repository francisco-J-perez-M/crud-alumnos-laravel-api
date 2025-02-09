@extends('layouts.app')

@section('title', 'Detalles del Alumno')
@section('header', 'Detalles del Alumno')

@section('content')
    <div class="card">
        <div class="card-header">
            Alumno: {{ $data['nombre'] }} {{ $data['app'] }} {{ $data['apm'] }}
        </div>
        <div class="card-body">
            <p><strong>Matrícula:</strong> {{ $data['matricula'] }}</p>
            <p><strong>Nombre:</strong> {{ $data['nombre'] }}</p>
            <p><strong>Apellidos:</strong> {{ $data['app'] }} {{ $data['apm'] }}</p>
            <p><strong>Fecha de Nacimiento:</strong> {{ $data['fn'] }}</p>
            <p><strong>Género:</strong> {{ $data['genero'] == 'M' ? 'Masculino' : 'Femenino' }}</p>
        </div>
        <div class="card-footer">
            <a href="{{ route('alumno.index') }}" class="btn btn-primary">Volver</a>
        </div>
    </div>
@endsection
