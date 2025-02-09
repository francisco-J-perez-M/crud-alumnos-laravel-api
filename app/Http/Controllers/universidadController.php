<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class UniversidadController extends Controller
{
    // Obtener todas las universidades
    public function index()
    {
        $response = Http::get('http://localhost:3000/api/universidad');

        if ($response->successful()) {
            $data = $response->json();
            return view('universidad.index', compact('data'));
        } else {
            return response()->json(['error' => 'Error al consultar la API'], 500);
        }
    }

    // Obtener una universidad por su ID
    public function show($id)
    {
        $response = Http::get('http://localhost:3000/api/universidad/' . $id);

        if ($response->successful()) {
            $data = $response->json();
            return view('universidad.show', compact('data'));
        } else {
            return response()->json(['error' => 'Error al consultar la API'], 500);
        }
    }

    public function store(Request $request)
{
    // Validar los datos del formulario
    $request->validate([
        'nombre' => 'required|string|max:255',
        'clave' => 'required|string|max:255',
    ]);

    $nuevaUniversidad = [
        'nombre' => $request->input('nombre'),
        'clave' => $request->input('clave'),
    ];

    // Enviar la solicitud POST a la API
    $response = Http::post('http://localhost:3000/api/universidad', $nuevaUniversidad);

    if ($response->successful()) {
        return redirect()->route('universidad.index')->with('success', 'Universidad creada exitosamente');
    } else {
        return back()->withInput()->with('error', 'Error al crear la universidad');
    }
}

public function update(Request $request, $id)
{
    // Validar los datos del formulario
    $request->validate([
        'nombre' => 'required|string|max:255',
        'clave' => 'required|string|max:255',
    ]);

    $datosActualizados = [
        'nombre' => $request->input('nombre'),
        'clave' => $request->input('clave'),
    ];

    // Enviar la solicitud PUT a la API
    $response = Http::put('http://localhost:3000/api/universidad/' . $id, $datosActualizados);

    if ($response->successful()) {
        return redirect()->route('universidad.index')->with('success', 'Universidad actualizada exitosamente');
    } else {
        return back()->withInput()->with('error', 'Error al actualizar la universidad');
    }
}

    // Eliminar una universidad
    public function destroy($id)
    {
        $response = Http::delete('http://localhost:3000/api/universidad/' . $id);

        if ($response->successful()) {
            return response()->json(['message' => 'Universidad eliminada exitosamente'], 200);
        } else {
            return response()->json(['error' => 'Error al eliminar la universidad'], 500);
        }
    }
    public function create()
{
    // Pasar un objeto $universidad vacío o null
    return view('universidad.create-edit', ['universidad' => null]);
}

public function edit($id)
{
    // Obtener la universidad por su ID
    $response = Http::get('http://localhost:3000/api/universidad/' . $id);

    if ($response->successful()) {
        $universidad = $response->json();
        return view('universidad.create-edit', ['universidad' => $universidad]);
    } else {
        return back()->with('error', 'Error al obtener la universidad');
    }
}
}