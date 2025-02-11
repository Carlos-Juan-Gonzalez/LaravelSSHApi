<?php
namespace App\Http\Controllers\Api;

use App\Models\Conductor;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ConductorController extends Controller
{
    // Obtener todos los conductores
    public function index()
    {
        return Conductor::all();
    }

    // Mostrar el formulario para crear un nuevo conductor
    public function create()
    {
        // No es necesario para API RESTful
    }

    // Almacenar un nuevo conductor
    public function store(Request $request)
    {
        $request->validate([
            'nia' => 'required|unique:conductores',
            'dni' => 'required|unique:conductores',
            'name' => 'required',
            'phone' => 'required',
            'location' => 'required',
            'email' => 'required|email',
        ]);

        $conductor = Conductor::create($request->all());

        return response()->json($conductor, 201);
    }

    // Mostrar un conductor específico
    public function show($id)
    {
        $conductor = Conductor::findOrFail($id);
        return response()->json($conductor);
    }

    // Mostrar el formulario para editar un conductor
    public function edit($id)
    {
        // No es necesario para API RESTful
    }

    // Actualizar un conductor existente
    public function update(Request $request, $id)
    {
        $conductor = Conductor::findOrFail($id);

        $request->validate([
            'nia' => 'required|unique:conductores,nia,' . $conductor->id,
            'dni' => 'required|unique:conductores,dni,' . $conductor->id,
            'name' => 'required',
            'phone' => 'required',
            'location' => 'required',
            'email' => 'required|email',
        ]);

        $conductor->update($request->all());

        return response()->json($conductor);
    }

    // Eliminar un conductor
    public function destroy($id)
    {
        $conductor = Conductor::findOrFail($id);
        $conductor->delete();

        return response()->json(null, 204);
    }
}

