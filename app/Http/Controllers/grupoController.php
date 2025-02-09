<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class GrupoController extends Controller
{
    // Obtener todos los grupos
    public function index()
    {
        $response = Http::get('http://localhost:3000/api/grupos');

        if ($response->successful()) {
            $data = $response->json();
            return view('grupos.index', compact('data'));
        } else {
            return response()->json(['error' => 'Error al consultar la API'], 500);
        }
    }

    // Obtener un grupo por su ID
    public function show($id)
    {
        $response = Http::get('http://localhost:3000/api/grupos/' . $id);

        if ($response->successful()) {
            $data = $response->json();
            return view('grupos.show', compact('data'));
        } else {
            return response()->json(['error' => 'Error al consultar la API'], 500);
        }
    }

    // Crear un nuevo grupo
    public function store(Request $request)
    {
        $nuevoGrupo = [
            'nombre' => $request->input('nombre'),
            'clave' => $request->input('clave'),
            'activo' => $request->input('activo', 1), // Valor por defecto si no se proporciona
            'id_carrera' => $request->input('id_carrera'),
        ];

        $response = Http::post('http://localhost:3000/api/grupos', $nuevoGrupo);

        if ($response->successful()) {
            return response()->json(['message' => 'Grupo creado exitosamente'], 201);
        } else {
            return response()->json(['error' => 'Error al crear el grupo'], 500);
        }
    }

    // Actualizar un grupo
    public function update(Request $request, $id)
    {
        $datosActualizados = [
            'nombre' => $request->input('nombre'),
            'clave' => $request->input('clave'),
            'activo' => $request->input('activo'),
            'id_carrera' => $request->input('id_carrera'),
        ];

        $response = Http::put('http://localhost:3000/api/grupos/' . $id, $datosActualizados);

        if ($response->successful()) {
            return response()->json(['message' => 'Grupo actualizado exitosamente'], 200);
        } else {
            return response()->json(['error' => 'Error al actualizar el grupo'], 500);
        }
    }

    // Eliminar un grupo
    public function destroy($id)
{
    // Enviar la solicitud DELETE a la API
    $response = Http::delete('http://localhost:3000/api/grupos/' . $id);

    if ($response->successful()) {
        return redirect()->route('grupo.index')->with('success', 'Grupo eliminado exitosamente');
    } else {
        return back()->with('error', 'Error al eliminar el grupo');
    }
}
    public function create()
{
    // Obtener las carreras desde la API o base de datos
    $response = Http::get('http://localhost:3000/api/carrera');
    $carreras = $response->successful() ? $response->json() : [];

    // Pasar un objeto $grupo vacío o null
    return view('grupos.create-edit', ['grupo' => null, 'carreras' => $carreras]);
}

public function edit($id)
{
    // Obtener el grupo por su ID
    $response = Http::get('http://localhost:3000/api/grupos/' . $id);

    if ($response->successful()) {
        $grupo = $response->json();

        // Obtener las carreras desde la API o base de datos
        $responseCarreras = Http::get('http://localhost:3000/api/carrera');
        $carreras = $responseCarreras->successful() ? $responseCarreras->json() : [];

        return view('grupos.create-edit', ['grupo' => $grupo, 'carreras' => $carreras]);
    } else {
        return back()->with('error', 'Error al obtener el grupo');
    }
}
}