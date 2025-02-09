@extends('layouts.app')

@section('title', 'Detalles de la Carrera')
@section('header', 'Detalles de la Carrera')

@section('content')
    <div class="card">
        <div class="card-header">
            Carrera: {{ $data['nombre'] }}
        </div>
        <div class="card-body">
            <p><strong>ID:</strong> {{ $data['id_carrera'] }}</p>
            <p><strong>Nombre:</strong> {{ $data['nombre'] }}</p>
            <p><strong>Activo:</strong> {{ $data['activo'] ? 'Sí' : 'No' }}</p>
            <p><strong>ID Universidad:</strong> {{ $data['id_universidad'] }}</p>
            <p><strong>Creado:</strong> {{ $data['created_at'] }}</p>
            <p><strong>Actualizado:</strong> {{ $data['updated_at'] }}</p>
        </div>
        <div class="card-footer">
            <a href="{{ route('carrera.index') }}" class="btn btn-primary">Volver</a>
        </div>
    </div>
@endsection