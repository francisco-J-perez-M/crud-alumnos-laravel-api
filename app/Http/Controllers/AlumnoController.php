<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class AlumnoController extends Controller
{
    // Obtener todos los registros de alumnos con paginación
    public function getData(Request $request)
    {
        

        $response = Http::get("http://localhost:3000/api/registros");

        if ($response->successful()) {
            $data = $response->json();
            return view('getData', compact('data'));
        } else {
            return response()->json(['error' => 'Error al consultar la API'], 500);
        }
    }

    // Obtener un alumno por su ID
    public function getData2($id)
    {
        $response = Http::get('http://localhost:3000/api/registros/' . $id);

        if ($response->successful()) {
            $data = $response->json();
            return view('getData2', compact('data'));
        } else {
            return response()->json(['error' => 'Error al consultar la API'], 500);
        }
    }

    // Mostrar el formulario para crear un nuevo alumno
    public function create()
    {
        // Obtener la lista de grupos desde la API
        $response = Http::get('http://localhost:3000/api/grupos');
        $grupos = $response->successful() ? $response->json() : [];

        return view('getDataForm', ['data' => null, 'grupos' => $grupos]);
    }

    // Guardar un nuevo alumno
    public function store(Request $request)
{
    // Validar los datos del formulario
    $request->validate([
        'matricula' => 'required|string|max:255',
        'nombre' => 'required|string|max:255',
        'app' => 'required|string|max:255',
        'apm' => 'nullable|string|max:255',
        'fn' => 'required|date',
        'sexo' => 'required|string|in:Masculino,Femenino',
        'id_grupo' => 'required|integer',
    ]);

    // Convertir "sexo" a "genero"
    $genero = $request->input('sexo') == 'Masculino' ? 'M' : 'F';

    // Datos que se van a enviar a la API
    $nuevoAlumno = [
        'matricula' => $request->input('matricula'),
        'nombre' => $request->input('nombre'),
        'app' => $request->input('app'),
        'apm' => $request->input('apm'),
        'fn' => $request->input('fn'),
        'genero' => $genero,
        'id_grupo' => $request->input('id_grupo'),
    ];

    // Enviar la solicitud POST a la API
    $response = Http::post('http://localhost:3000/api/registros', $nuevoAlumno);

    if ($response->successful()) {
        return redirect()->route('alumno.index')->with('success', 'Alumno creado exitosamente');
    } else {
        return back()->withInput()->with('error', 'Error al crear el alumno');
    }
}

    // Mostrar el formulario para editar un alumno
    public function edit($id)
    {
        // Obtener el alumno por su ID
        $response = Http::get('http://localhost:3000/api/registros/' . $id);

        if ($response->successful()) {
            $data = $response->json();

            // Obtener la lista de grupos desde la API
            $responseGrupos = Http::get('http://localhost:3000/api/grupos');
            $grupos = $responseGrupos->successful() ? $responseGrupos->json() : [];

            return view('getDataForm', ['data' => $data, 'grupos' => $grupos]);
        } else {
            return back()->with('error', 'Error al obtener el alumno');
        }
    }

    // Actualizar un alumno existente
    public function updateData(Request $request, $id)
{
    // Validar los datos del formulario
    $request->validate([
        'matricula' => 'required|string|max:255',
        'nombre' => 'required|string|max:255',
        'app' => 'required|string|max:255',
        'apm' => 'nullable|string|max:255',
        'fn' => 'required|date',
        'sexo' => 'required|string|in:Masculino,Femenino',
        'id_grupo' => 'required|integer',
    ]);

    // Convertir "sexo" a "genero"
    $genero = $request->input('sexo') == 'Masculino' ? 'M' : 'F';

    // Datos que se van a actualizar
    $datosActualizados = [
        'matricula' => $request->input('matricula'),
        'nombre' => $request->input('nombre'),
        'app' => $request->input('app'),
        'apm' => $request->input('apm'),
        'fn' => $request->input('fn'),
        'genero' => $genero,  // Cambia "sexo" por "genero"
        'id_grupo' => $request->input('id_grupo'),
    ];

    // Enviar la solicitud PUT a la API
    $response = Http::put('http://localhost:3000/api/registros/' . $id, $datosActualizados);

    if ($response->successful()) {
        return redirect()->route('alumno.index')->with('success', 'Alumno actualizado exitosamente');
    } else {
        return back()->withInput()->with('error', 'Error al actualizar el alumno');
    }
}

    // Eliminar un alumno
    public function deleteData($id)
    {
        // Enviar la solicitud DELETE a la API
        $response = Http::delete('http://localhost:3000/api/registros/' . $id);

        if ($response->successful()) {
            return redirect()->route('alumno.index')->with('success', 'Alumno eliminado exitosamente');
        } else {
            return back()->with('error', 'Error al eliminar el alumno');
        }
    }
}