@extends('layouts.app')

@section('title', isset($carrera['id_carrera']) ? 'Editar Carrera' : 'Crear Carrera')
@section('header', isset($carrera['id_carrera']) ? 'Editar Carrera' : 'Agregar Carrera')

@section('content')
    <form action="{{ isset($carrera['id_carrera']) ? route('carrera.update', $carrera['id_carrera']) : route('carrera.store') }}" method="POST">
        @csrf
        @if (isset($carrera['id_carrera']))
            @method('PUT')
        @endif

        <div class="mb-3">
            <label for="nombre" class="form-label">Nombre de la Carrera</label>
            <input type="text" name="nombre" id="nombre" class="form-control" value="{{ old('nombre', $carrera['nombre'] ?? '') }}" required>
        </div>

        <div class="mb-3">
            <label for="activo" class="form-label">Activo</label>
            <select name="activo" id="activo" class="form-select" required>
                <option value="1" {{ old('activo', $carrera['activo'] ?? '') == 1 ? 'selected' : '' }}>Sí</option>
                <option value="0" {{ old('activo', $carrera['activo'] ?? '') == 0 ? 'selected' : '' }}>No</option>
            </select>
        </div>

        <div class="mb-3">
            <label for="id_universidad" class="form-label">Universidad</label>
            <select name="id_universidad" id="id_universidad" class="form-select" required>
                @foreach ($universidades as $universidad)
                    <option value="{{ $universidad['id_universidad'] }}" {{ old('id_universidad', $carrera['id_universidad'] ?? '') == $universidad['id_universidad'] ? 'selected' : '' }}>
                        {{ $universidad['nombre'] }}
                    </option>
                @endforeach
            </select>
        </div>

        <button type="submit" class="btn btn-success">Guardar</button>
        <a href="{{ route('carrera.index') }}" class="btn btn-secondary">Cancelar</a>
    </form>
@endsection