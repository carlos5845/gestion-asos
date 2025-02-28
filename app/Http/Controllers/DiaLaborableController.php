<?php

namespace App\Http\Controllers;

use App\Models\DiaLaborable;
use Illuminate\Http\Request;

class DiaLaborableController extends Controller
{
    public function index()
    {
        $dias = DiaLaborable::all();
        return view('dia_laborable.index', compact('dias'));
    }

    public function create()
    {
        return view('dia_laborable.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'dia' => 'required|string|max:35|unique:dia_laborable,dia',
        ]);

        DiaLaborable::create($request->all());

        return redirect()->route('dia_laborable.index')->with('success', 'Día Laborable creado correctamente.');
    }

    public function show($iddia_laborable)
    {
        $dia = DiaLaborable::findOrFail($iddia_laborable);
        return view('dia_laborable.show', compact('dia'));
    }

    public function edit($iddia_laborable)
    {
        $dia = DiaLaborable::findOrFail($iddia_laborable);
        return view('dia_laborable.edit', compact('dia'));
    }

    public function update(Request $request, $iddia_laborable)
    {
        $request->validate([
            'dia' => 'required|string|max:35|unique:dia_laborable,dia,' . $iddia_laborable . ',iddia_laborable',
        ]);

        $dia = DiaLaborable::findOrFail($iddia_laborable);
        $dia->update($request->all());

        return redirect()->route('dia_laborable.index')->with('success', 'Día Laborable actualizado correctamente.');
    }

    public function destroy($iddia_laborable)
    {
        $dia = DiaLaborable::findOrFail($iddia_laborable);
        $dia->delete();

        return redirect()->route('dia_laborable.index')->with('success', 'Día Laborable eliminado correctamente.');
    }
}
