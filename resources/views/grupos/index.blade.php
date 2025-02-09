@extends('layouts.app')

@section('title', 'Listado de Grupos')
@section('header', 'Listado de Grupos')

@section('content')
    <a href="{{ route('grupo.create') }}" class="btn btn-primary mb-3">Agregar Grupo</a>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Clave</th>
                <th>Activo</th>
                <th>ID Carrera</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($data as $grupo)
                <tr>
                    <td>{{ $grupo['id_grupo'] }}</td>
                    <td>{{ $grupo['nombre'] }}</td>
                    <td>{{ $grupo['clave'] }}</td>
                    <td>{{ $grupo['activo'] ? 'Sí' : 'No' }}</td>
                    <td>{{ $grupo['id_carrera'] }}</td>
                    <td>
                        <a href="{{ route('grupo.show', $grupo['id_grupo']) }}" class="btn btn-info btn-sm">Detalles</a>
                        <a href="{{ route('grupo.edit', $grupo['id_grupo']) }}" class="btn btn-warning btn-sm">Editar</a>
                        <form action="{{ route('grupo.destroy', $grupo['id_grupo']) }}" method="POST" style="display:inline-block;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('¿Estás seguro de eliminar este grupo?')">Eliminar</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection