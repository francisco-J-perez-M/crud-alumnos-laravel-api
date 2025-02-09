@extends('layouts.app')

@section('title', 'Detalles de la Universidad')
@section('header', 'Detalles de la Universidad')

@section('content')
    <div class="card">
        <div class="card-header">
            Universidad: {{ $data['nombre'] }}
        </div>
        <div class="card-body">
            <p><strong>ID:</strong> {{ $data['id_universidad'] }}</p>
            <p><strong>Nombre:</strong> {{ $data['nombre'] }}</p>
            <p><strong>Clave:</strong> {{ $data['clave'] }}</p>
            <p><strong>Creado:</strong> {{ $data['created_at'] }}</p>
            <p><strong>Actualizado:</strong> {{ $data['updated_at'] }}</p>
        </div>
        <div class="card-footer">
            <a href="{{ route('universidad.index') }}" class="btn btn-primary">Volver</a>
        </div>
    </div>
@endsection