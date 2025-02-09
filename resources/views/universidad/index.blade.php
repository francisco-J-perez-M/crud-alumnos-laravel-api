@extends('layouts.app')

@section('title', 'Listado de Universidades')
@section('header', 'Listado de Universidades')

@section('content')
    <a href="{{ route('universidad.create') }}" class="btn btn-primary mb-3">Agregar Universidad</a>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Clave</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($data as $universidad)
                <tr>
                    <td>{{ $universidad['id_universidad'] }}</td>
                    <td>{{ $universidad['nombre'] }}</td>
                    <td>{{ $universidad['clave'] }}</td>
                    <td>
                        <a href="{{ route('universidad.show', $universidad['id_universidad']) }}" class="btn btn-info btn-sm">Detalles</a>
                        <a href="{{ route('universidad.edit', $universidad['id_universidad']) }}" class="btn btn-warning btn-sm">Editar</a>
                        <form action="{{ route('universidad.destroy', $universidad['id_universidad']) }}" method="POST" style="display:inline-block;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('¿Estás seguro de eliminar esta universidad?')">Eliminar</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection