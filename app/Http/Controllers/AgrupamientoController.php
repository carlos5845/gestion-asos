<?php

namespace App\Http\Controllers;

use App\Models\Agrupamiento;
use Illuminate\Http\Request;

class AgrupamientoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $agrupamientos = Agrupamiento::all();
        return view('agrupamiento.index', compact('agrupamientos'));
    }

    public function create()
    {
        return view('agrupamiento.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'cod_etiqueta' => 'required|string|max:15|unique:agrupamiento,cod_etiqueta',
            'agrupamientocol' => 'required|string|max:45',
        ]);

        Agrupamiento::create($request->all());

        return redirect()->route('agrupamiento.index')->with('success', 'Agrupamiento creado correctamente.');
    }

    public function show($idagrupamiento)
    {
        $agrupamiento = Agrupamiento::findOrFail($idagrupamiento);
        return view('agrupamiento.show', compact('agrupamiento'));
    }

    public function edit($idagrupamiento)
    {
        $agrupamiento = Agrupamiento::findOrFail($idagrupamiento);
        return view('agrupamiento.edit', compact('agrupamiento'));
    }

    public function update(Request $request, $idagrupamiento)
    {
        $request->validate([
            'cod_etiqueta' => 'required|string|max:15|unique:agrupamiento,cod_etiqueta,' . $idagrupamiento . ',idagrupamiento',
            'agrupamientocol' => 'required|string|max:45',
        ]);

        $agrupamiento = Agrupamiento::findOrFail($idagrupamiento);
        $agrupamiento->update($request->all());

        return redirect()->route('agrupamiento.index')->with('success', 'Agrupamiento actualizado correctamente.');
    }

    public function destroy($idagrupamiento)
    {
        $agrupamiento = Agrupamiento::findOrFail($idagrupamiento);
        $agrupamiento->delete();

        return redirect()->route('agrupamiento.index')->with('success', 'Agrupamiento eliminado correctamente.');
    }
}
