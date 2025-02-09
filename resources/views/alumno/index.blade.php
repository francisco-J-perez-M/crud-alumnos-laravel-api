@extends('layouts.app')

@section('title', 'Listado de Alumnos')
@section('header', 'Listado de Alumnos')

@section('content')
    <a href="#" class="btn btn-primary mb-3">Agregar Alumno</a>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Matrícula</th>
                <th>Nombre</th>
                <th>Apellidos</th>
                <th>Género</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($alumnos as $alumno)
                <tr>
                    <td>{{ $alumno->id_alumno }}</td>
                    <td>{{ $alumno->matricula }}</td>
                    <td>{{ $alumno->nombre }}</td>
                    <td>{{ $alumno->app }} {{ $alumno->apm }}</td>
                    <td>{{ $alumno->genero == 'M' ? 'Masculino' : 'Femenino' }}</td>
                    <td>
                        <a href="{{ route('alumno.show', $alumno->id_alumno) }}" class="btn btn-info btn-sm">Detalles</a>
                        <a href="#" class="btn btn-warning btn-sm">Editar</a>
                        <form action="{{ route('alumno.destroy', $alumno->id_alumno) }}" method="POST" style="display:inline-block;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('¿Estás seguro de eliminar este alumno?')">Eliminar</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
