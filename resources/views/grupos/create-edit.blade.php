@extends('layouts.app')
<form action="{{ isset($grupo['id_grupo']) ? route('grupo.update', $grupo['id_grupo']) : route('grupo.store') }}" method="POST">
    @csrf
    @if (isset($grupo['id_grupo']))
        @method('PUT') 
    @endif

    <div class="mb-3">
        <label for="nombre" class="form-label">Nombre del Grupo</label>
        <input type="text" name="nombre" id="nombre" class="form-control" value="{{ old('nombre', $grupo['nombre'] ?? '') }}" required>
    </div>

    <div class="mb-3">
        <label for="clave" class="form-label">Clave</label>
        <input type="text" name="clave" id="clave" class="form-control" value="{{ old('clave', $grupo['clave'] ?? '') }}" required>
    </div>

    <div class="mb-3">
        <label for="activo" class="form-label">Activo</label>
        <select name="activo" id="activo" class="form-select" required>
            <option value="1" {{ old('activo', $grupo['activo'] ?? '') == 1 ? 'selected' : '' }}>Sí</option>
            <option value="0" {{ old('activo', $grupo['activo'] ?? '') == 0 ? 'selected' : '' }}>No</option>
        </select>
    </div>

    <div class="mb-3">
        <label for="id_carrera" class="form-label">Carrera</label>
        <select name="id_carrera" id="id_carrera" class="form-select" required>
            <option value="">Seleccione una carrera</option>
            @foreach ($carreras as $carrera)
                <option value="{{ $carrera['id_carrera'] }}" {{ old('id_carrera', $grupo['id_carrera'] ?? '') == $carrera['id_carrera'] ? 'selected' : '' }}>
                    {{ $carrera['nombre'] }}
                </option>
            @endforeach
        </select>
    </div>

    <button type="submit" class="btn btn-success">Guardar</button>
    <a href="{{ route('grupo.index') }}" class="btn btn-secondary">Cancelar</a>
</form>