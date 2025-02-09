@extends('layouts.app')

@section('title', 'Listado de Carreras')
@section('header', 'Listado de Carreras')

@section('content')
    <a href="{{ route('carrera.create') }}" class="btn btn-primary mb-3">Agregar Carrera</a>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Activo</th>
                <th>ID Universidad</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($data as $carrera)
                <tr>
                    <td>{{ $carrera['id_carrera'] }}</td>
                    <td>{{ $carrera['nombre'] }}</td>
                    <td>{{ $carrera['activo'] ? 'Sí' : 'No' }}</td>
                    <td>{{ $carrera['id_universidad'] }}</td>
                    <td>
                        <a href="{{ route('carrera.show', $carrera['id_carrera']) }}" class="btn btn-info btn-sm">Detalles</a>
                        <a href="{{ route('carrera.edit', $carrera['id_carrera']) }}" class="btn btn-warning btn-sm">Editar</a>
                        <form action="{{ route('carrera.destroy', $carrera['id_carrera']) }}" method="POST" style="display:inline-block;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('¿Estás seguro de eliminar esta carrera?')">Eliminar</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection