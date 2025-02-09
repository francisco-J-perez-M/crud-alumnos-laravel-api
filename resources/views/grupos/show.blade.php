@extends('layouts.app')

@section('title', 'Detalles del Grupo')
@section('header', 'Detalles del Grupo')

@section('content')
    <div class="card">
        <div class="card-header">
            Grupo: {{ $data['nombre'] }}
        </div>
        <div class="card-body">
            <p><strong>ID:</strong> {{ $data['id_grupo'] }}</p>
            <p><strong>Nombre:</strong> {{ $data['nombre'] }}</p>
            <p><strong>Clave:</strong> {{ $data['clave'] }}</p>
            <p><strong>Activo:</strong> {{ $data['activo'] ? 'Sí' : 'No' }}</p>
            <p><strong>ID Carrera:</strong> {{ $data['id_carrera'] }}</p>
        </div>
        <div class="card-footer">
            <a href="{{ route('grupo.index') }}" class="btn btn-primary">Volver</a>
        </div>
    </div>
@endsection