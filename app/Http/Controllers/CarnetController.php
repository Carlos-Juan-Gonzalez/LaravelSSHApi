<?php

namespace App\Http\Controllers;

use App\Models\Carnet;
use Illuminate\Http\Request;

class CarnetController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
    $carnets = Carnet::all();
    return view('carnet.index', compact('carnets'));
    }

    public function create()
    {
        return view('carnet.create');
    }

    public function store(Request $request)
    {
     $request->validate([
            'tipo' => 'required|string|max:50',
            'fecha_expedicion' => 'required|date',
        ]);

        Carnet::create($request->all());

        return redirect()->route('carnet.index')->with('success', 'Carnet añadido correctamente.');
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
        $conductor = Carnet::findOrFail($id);
        $conductor->delete();

        return redirect()->route('carnet.index')->with('success', 'Carnet eliminado.');
    }
}
