<?php

namespace App\Http\Controllers;

use App\Models\Conductor;
use App\Models\Carnet;
use Illuminate\Http\Request;

class ConductorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
    $conductores = Conductor::all();
    return view('conductores.index', compact('conductores'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
    $carnets = Carnet::all();
 
    return view('conductores.create', compact('carnets'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'tipo' => 'required|string|max:50',
            'fecha_expedicion' => 'required|date',
        ]);

        Carnet::create($request->all());

        return redirect()->route('conductores.index')->with('success', 'Conductor añadido correctamente.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $conductor = Conductor::findOrFail($id);
        $conductor->delete();

        return redirect()->route('conductores.index')->with('success', 'Conductor eliminado.');
    }
}

