@extends('layouts.app')

<body>
    <div class="container mt-5">
        <h1 class="mb-4">Listado de Alumnos</h1>
        <a href="{{ route('alumno.create') }}" class="btn btn-primary mb-3">Agregar Alumno</a>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Matrícula</th>
                    <th>Nombre</th>
                    <th>Apellidos</th>
                    <th>Fecha de Nacimiento</th>
                    <th>Género</th>
                    <th>ID Grupo</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
            @foreach (collect($data)->chunk(100) as $chunk)
                    @foreach ($chunk as $alumno)
                        <tr>
                            <td>{{ $alumno['id_alumno'] }}</td>
                            <td>{{ $alumno['matricula'] }}</td>
                            <td>{{ $alumno['nombre'] }}</td>
                            <td>{{ $alumno['app'] }} {{ $alumno['apm'] }}</td>
                            <td>{{ \Carbon\Carbon::parse($alumno['fn'])->format('d/m/Y') }}</td>
                            <td>{{ $alumno['genero'] == 'M' ? 'Masculino' : 'Femenino' }}</td>
                            <td>{{ $alumno['id_grupo'] }}</td>
                            <td>
                                <a href="{{ route('alumno.show', $alumno['id_alumno']) }}" class="btn btn-info btn-sm">Detalles</a>
                                <a href="{{ route('alumno.edit', $alumno['id_alumno']) }}" class="btn btn-warning btn-sm">Editar</a>
                                <form action="{{ route('alumno.destroy', $alumno['id_alumno']) }}" method="POST" style="display:inline-block;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('¿Estás seguro de eliminar este alumno?')">Eliminar</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                @endforeach
            </tbody>
        </table>
    </div>
</body>
