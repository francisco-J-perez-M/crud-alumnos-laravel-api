@extends('layouts.app')

@section('title', isset($universidad['id_universidad']) ? 'Editar Universidad' : 'Crear Universidad')
@section('header', isset($universidad['id_universidad']) ? 'Editar Universidad' : 'Agregar Universidad')

@section('content')
    <form action="{{ isset($universidad['id_universidad']) ? route('universidad.update', $universidad['id_universidad']) : route('universidad.store') }}" method="POST">
        @csrf
        @if (isset($universidad['id_universidad']))
            @method('PUT')
        @endif

        <div class="mb-3">
            <label for="nombre" class="form-label">Nombre de la Universidad</label>
            <input type="text" name="nombre" id="nombre" class="form-control" value="{{ old('nombre', $universidad['nombre'] ?? '') }}" required>
        </div>

        <div class="mb-3">
            <label for="clave" class="form-label">Clave</label>
            <input type="text" name="clave" id="clave" class="form-control" value="{{ old('clave', $universidad['clave'] ?? '') }}" required>
        </div>

        <button type="submit" class="btn btn-success">Guardar</button>
        <a href="{{ route('universidad.index') }}" class="btn btn-secondary">Cancelar</a>
    </form>
@endsection