<?php

namespace App\Http\Controllers;

use App\Models\ActaConstatacion;
use Illuminate\Http\Request;

class ActaConstatacionController extends Controller
{
    public function index()
    {
        $actas = ActaConstatacion::all();
        return view('acta_constatacion.index', compact('actas'));
    }

    public function create()
    {
        return view('acta_constatacion.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'num_constatacion' => 'required|string|max:45|unique:acta_constatacion,num_constatacion',
        ]);

        ActaConstatacion::create($request->all());

        return redirect()->route('acta_constatacion.index')->with('success', 'Acta de Constatación creada correctamente.');
    }

    public function show($idacta_constatacion)
    {
        $acta = ActaConstatacion::findOrFail($idacta_constatacion);
        return view('acta_constatacion.show', compact('acta'));
    }

    public function edit($idacta_constatacion)
    {
        $acta = ActaConstatacion::findOrFail($idacta_constatacion);
        return view('acta_constatacion.edit', compact('acta'));
    }

    public function update(Request $request, $idacta_constatacion)
    {
        $request->validate([
            'num_constatacion' => 'required|string|max:45|unique:acta_constatacion,num_constatacion,' . $idacta_constatacion . ',idacta_constatacion',
        ]);

        $acta = ActaConstatacion::findOrFail($idacta_constatacion);
        $acta->update($request->all());

        return redirect()->route('acta_constatacion.index')->with('success', 'Acta de Constatación actualizada correctamente.');
    }

    public function destroy($idacta_constatacion)
    {
        $acta = ActaConstatacion::findOrFail($idacta_constatacion);
        $acta->delete();

        return redirect()->route('acta_constatacion.index')->with('success', 'Acta de Constatación eliminada correctamente.');
    }
}
