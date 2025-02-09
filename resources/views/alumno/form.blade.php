@extends('layouts.app')

@section('title', $alumno->id_alumno ?? 'Crear Alumno')
@section('header', $alumno->id_alumno ? 'Editar Alumno' : 'Agregar Alumno')

@section('content')
    <form action="{{ $alumno->id_alumno ? route('alumno.update', $alumno->id_alumno) : route('alumno.store') }}" method="POST">
        @csrf
        @if ($alumno->id_alumno)
            @method('PUT')
        @endif

        <div class="mb-3">
            <label for="matricula" class="form-label">Matrícula</label>
            <input type="text" name="matricula" id="matricula" class="form-control" value="{{ old('matricula', $alumno->matricula ?? '') }}" required>
        </div>

        <div class="mb-3">
            <label for="nombre" class="form-label">Nombre</label>
            <input type="text" name="nombre" id="nombre" class="form-control" value="{{ old('nombre', $alumno->nombre ?? '') }}" required>
        </div>

        <div class="mb-3">
            <label for="app" class="form-label">Apellido Paterno</label>
            <input type="text" name="app" id="app" class="form-control" value="{{ old('app', $alumno->app ?? '') }}" required>
        </div>

        <div class="mb-3">
            <label for="apm" class="form-label">Apellido Materno</label>
            <input type="text" name="apm" id="apm" class="form-control" value="{{ old('apm', $alumno->apm ?? '') }}">
        </div>

        <div class="mb-3">
            <label for="fn" class="form-label">Fecha de Nacimiento</label>
            <input type="date" name="fn" id="fn" class="form-control" value="{{ old('fn', $alumno->fn ?? '') }}" required>
        </div>

        <div class="mb-3">
            <label for="genero" class="form-label">Género</label>
            <select name="genero" id="genero" class="form-select" required>
                <option value="M" {{ old('genero', $alumno->genero ?? '') == 'M' ? 'selected' : '' }}>Masculino</option>
                <option value="F" {{ old('genero', $alumno->genero ?? '') == 'F' ? 'selected' : '' }}>Femenino</option>
            </select>
        </div>

        <button type="submit" class="btn btn-success">Guardar</button>
        <a href="{{ route('alumno.index') }}" class="btn btn-secondary">Cancelar</a>
    </form>
@endsection
