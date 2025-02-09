<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class CarreraController extends Controller
{
    // Obtener todas las carreras
    public function index()
    {
        $response = Http::get('http://localhost:3000/api/carrera');

        if ($response->successful()) {
            $data = $response->json();
            return view('carrera.index', compact('data'));
        } else {
            return response()->json(['error' => 'Error al consultar la API'], 500);
        }
    }

    // Obtener una carrera por su ID
    public function show($id)
    {
        $response = Http::get('http://localhost:3000/api/carrera/' . $id);

        if ($response->successful()) {
            $data = $response->json();
            return view('carrera.show', compact('data'));
        } else {
            return response()->json(['error' => 'Error al consultar la API'], 500);
        }
    }

    // Crear una nueva carrera
    public function store(Request $request)
    {
        $nuevaCarrera = [
            'nombre' => $request->input('nombre'),
            'activo' => $request->input('activo', 1), // Valor por defecto si no se proporciona
            'id_universidad' => $request->input('id_universidad'),
        ];

        $response = Http::post('http://localhost:3000/api/carrera', $nuevaCarrera);

        if ($response->successful()) {
            return response()->json(['message' => 'Carrera creada exitosamente'], 201);
        } else {
            return response()->json(['error' => 'Error al crear la carrera'], 500);
        }
    }

    // Actualizar una carrera
    public function update(Request $request, $id)
    {
        $datosActualizados = [
            'nombre' => $request->input('nombre'),
            'activo' => $request->input('activo'),
            'id_universidad' => $request->input('id_universidad'),
        ];

        $response = Http::put('http://localhost:3000/api/carrera/' . $id, $datosActualizados);

        if ($response->successful()) {
            return response()->json(['message' => 'Carrera actualizada exitosamente'], 200);
        } else {
            return response()->json(['error' => 'Error al actualizar la carrera'], 500);
        }
    }

    // Eliminar una carrera
    public function destroy($id)
    {
        $response = Http::delete('http://localhost:3000/api/carrera/' . $id);

        if ($response->successful()) {
            return response()->json(['message' => 'Carrera eliminada exitosamente'], 200);
        } else {
            return response()->json(['error' => 'Error al eliminar la carrera'], 500);
        }
    }
    public function create()
{
    // Obtener las universidades desde la API
    $response = Http::get('http://localhost:3000/api/universidad');
    $universidades = $response->successful() ? $response->json() : [];

    // Pasar un objeto $carrera vacío o null
    return view('carrera.create-edit', ['carrera' => null, 'universidades' => $universidades]);
}

public function edit($id)
{
    // Obtener la carrera por su ID
    $response = Http::get('http://localhost:3000/api/carrera/' . $id);

    if ($response->successful()) {
        $carrera = $response->json();

        // Obtener las universidades desde la API
        $responseUniversidades = Http::get('http://localhost:3000/api/universidad');
        $universidades = $responseUniversidades->successful() ? $responseUniversidades->json() : [];

        return view('carrera.create-edit', ['carrera' => $carrera, 'universidades' => $universidades]);
    } else {
        return back()->with('error', 'Error al obtener la carrera');
    }
}
}