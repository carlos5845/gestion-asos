<?php

namespace App\Http\Controllers;

use App\Models\ActaConstitucion;
use Illuminate\Http\Request;
use App\Models\Grupo;
use Illuminate\Support\Facades\Storage;

class ActaConstitucionController extends Controller
{
    public function index()
    {
        $actas = ActaConstitucion::with('grupo')->get();
        return view('acta_constitucion.index', compact('actas'));
    }

    public function create()
    {
        $grupos = Grupo::all();
        return view('acta_constitucion.create', compact('grupos'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'fecha_fundacion' => 'nullable|date',
            'archivo_acta' => 'nullable|file|mimes:pdf,doc,docx|max:2048',
            'grupo_idgrupo' => 'required|exists:grupo,idgrupo',
        ]);

        $archivoPath = null;
        if ($request->hasFile('archivo_acta')) {
            $archivoPath = $request->file('archivo_acta')->store('actas_constitucion', 'public');
        }

        ActaConstitucion::create([
            'fecha_fundacion' => $request->fecha_fundacion,
            'archivo_acta' => $archivoPath,
            'grupo_idgrupo' => $request->grupo_idgrupo,
        ]);

        return redirect()->route('acta_constitucion.index')->with('success', 'Acta de Constitución creada correctamente.');
    }

    public function show($idacta_constitucion)
    {
        $acta = ActaConstitucion::with('grupo')->findOrFail($idacta_constitucion);
        return view('acta_constitucion.show', compact('acta'));
    }

    public function edit($idacta_constitucion)
    {
        $acta = ActaConstitucion::findOrFail($idacta_constitucion);
        $grupos = Grupo::all();
        return view('acta_constitucion.edit', compact('acta', 'grupos'));
    }

    public function update(Request $request, $idacta_constitucion)
    {
        $request->validate([
            'fecha_fundacion' => 'nullable|date',
            'archivo_acta' => 'nullable|file|mimes:pdf,doc,docx|max:2048',
            'grupo_idgrupo' => 'required|exists:grupo,idgrupo',
        ]);

        $acta = ActaConstitucion::findOrFail($idacta_constitucion);

        if ($request->hasFile('archivo_acta')) {
            if ($acta->archivo_acta) {
                Storage::disk('public')->delete($acta->archivo_acta);
            }
            $archivoPath = $request->file('archivo_acta')->store('actas_constitucion', 'public');
            $acta->archivo_acta = $archivoPath;
        }

        $acta->fecha_fundacion = $request->fecha_fundacion;
        $acta->grupo_idgrupo = $request->grupo_idgrupo;
        $acta->save();

        return redirect()->route('acta_constitucion.index')->with('success', 'Acta de Constitución actualizada correctamente.');
    }

    public function destroy($idacta_constitucion)
    {
        $acta = ActaConstitucion::findOrFail($idacta_constitucion);

        if ($acta->archivo_acta) {
            Storage::disk('public')->delete($acta->archivo_acta);
        }

        $acta->delete();

        return redirect()->route('acta_constitucion.index')->with('success', 'Acta de Constitución eliminada correctamente.');
    }
}
