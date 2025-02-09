@extends('layouts.app')
    <div class="container mt-5">
        <h1>{{ isset($data['id_alumno']) ? 'Editar Alumno' : 'Agregar Alumno' }}</h1>
        <form action="{{ isset($data['id_alumno']) ? route('alumno.update', $data['id_alumno']) : route('alumno.store') }}" method="POST">
            @csrf
            @if (isset($data['id_alumno']))
                @method('PUT')
            @endif

            <div class="mb-3">
                <label for="matricula" class="form-label">Matrícula</label>
                <input type="text" name="matricula" id="matricula" class="form-control" value="{{ old('matricula', $data['matricula'] ?? '') }}" required>
            </div>

            <div class="mb-3">
                <label for="nombre" class="form-label">Nombre</label>
                <input type="text" name="nombre" id="nombre" class="form-control" value="{{ old('nombre', $data['nombre'] ?? '') }}" required>
            </div>

            <div class="mb-3">
                <label for="app" class="form-label">Apellido Paterno</label>
                <input type="text" name="app" id="app" class="form-control" value="{{ old('app', $data['app'] ?? '') }}" required>
            </div>

            <div class="mb-3">
                <label for="apm" class="form-label">Apellido Materno</label>
                <input type="text" name="apm" id="apm" class="form-control" value="{{ old('apm', $data['apm'] ?? '') }}">
            </div>

            <div class="mb-3">
                <label for="fn" class="form-label">Fecha de Nacimiento</label>
                <input type="date" name="fn" id="fn" class="form-control" value="{{ old('fn', $data['fn'] ?? '') }}" required>
            </div>

            <div class="mb-3">
                <label for="sexo" class="form-label">Género</label>
                <select name="sexo" id="sexo" class="form-select" required>
                    <option value="Masculino" {{ old('sexo', $data['sexo'] ?? '') == 'Masculino' ? 'selected' : '' }}>Masculino</option>
                    <option value="Femenino" {{ old('sexo', $data['sexo'] ?? '') == 'Femenino' ? 'selected' : '' }}>Femenino</option>
                </select>
            </div>

            <div class="mb-3">
                <label for="id_grupo" class="form-label">Grupo</label>
                <select name="id_grupo" id="id_grupo" class="form-select" required>
                    <option value="">Seleccione un grupo</option>
                    @foreach ($grupos as $grupo)
                        <option value="{{ $grupo['id_grupo'] }}" {{ old('id_grupo', $data['id_grupo'] ?? '') == $grupo['id_grupo'] ? 'selected' : '' }}>
                            {{ $grupo['nombre'] }}
                        </option>
                    @endforeach
                </select>
            </div>

            <button type="submit" class="btn btn-success">Guardar</button>
            <a href="{{ route('alumno.index') }}" class="btn btn-secondary">Cancelar</a>
        </form>
    </div>