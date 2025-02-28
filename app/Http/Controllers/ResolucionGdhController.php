<?php

namespace App\Http\Controllers;

use App\Models\ResolucionGdh;
use Illuminate\Http\Request;
use App\Models\Grupo;
use Illuminate\Support\Facades\Storage;

class ResolucionGdhController extends Controller
{
    public function index()
    {
        $resoluciones = ResolucionGdh::with('grupo')->get();
        return view('resolucion_gdh.index', compact('resoluciones'));
    }

    public function create()
    {
        $grupos = Grupo::all();
        return view('resolucion_gdh.create', compact('grupos'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'num_resolucion' => 'required|string|max:45|unique:resolucion_gdh,num_resolucion',
            'fecha_emision' => 'required|date',
            'archivo_gdh' => 'nullable|file|mimes:pdf,doc,docx|max:2048',
            'grupo_idgrupo' => 'required|exists:grupo,idgrupo',
        ]);

        $archivoPath = null;
        if ($request->hasFile('archivo_gdh')) {
            $archivoPath = $request->file('archivo_gdh')->store('resoluciones_gdh', 'public');
        }

        ResolucionGdh::create([
            'num_resolucion' => $request->num_resolucion,
            'fecha_emision' => $request->fecha_emision,
            'archivo_gdh' => $archivoPath,
            'grupo_idgrupo' => $request->grupo_idgrupo,
        ]);

        return redirect()->route('resolucion_gdh.index')->with('success', 'Resolución GDH creada correctamente.');
    }

    public function show($idresolucion_gdh)
    {
        $resolucion = ResolucionGdh::with('grupo')->findOrFail($idresolucion_gdh);
        return view('resolucion_gdh.show', compact('resolucion'));
    }

    public function edit($idresolucion_gdh)
    {
        $resolucion = ResolucionGdh::findOrFail($idresolucion_gdh);
        $grupos = Grupo::all();
        return view('resolucion_gdh.edit', compact('resolucion', 'grupos'));
    }

    public function update(Request $request, $idresolucion_gdh)
    {
        $request->validate([
            'num_resolucion' => 'required|string|max:45|unique:resolucion_gdh,num_resolucion,' . $idresolucion_gdh . ',idresolucion_gdh',
            'fecha_emision' => 'required|date',
            'archivo_gdh' => 'nullable|file|mimes:pdf,doc,docx|max:2048',
            'grupo_idgrupo' => 'required|exists:grupo,idgrupo',
        ]);

        $resolucion = ResolucionGdh::findOrFail($idresolucion_gdh);

        if ($request->hasFile('archivo_gdh')) {
            if ($resolucion->archivo_gdh) {
                Storage::disk('public')->delete($resolucion->archivo_gdh);
            }
            $archivoPath = $request->file('archivo_gdh')->store('resoluciones_gdh', 'public');
            $resolucion->archivo_gdh = $archivoPath;
        }

        $resolucion->num_resolucion = $request->num_resolucion;
        $resolucion->fecha_emision = $request->fecha_emision;
        $resolucion->grupo_idgrupo = $request->grupo_idgrupo;
        $resolucion->save();

        return redirect()->route('resolucion_gdh.index')->with('success', 'Resolución GDH actualizada correctamente.');
    }

    public function destroy($idresolucion_gdh)
    {
        $resolucion = ResolucionGdh::findOrFail($idresolucion_gdh);

        if ($resolucion->archivo_gdh) {
            Storage::disk('public')->delete($resolucion->archivo_gdh);
        }

        $resolucion->delete();

        return redirect()->route('resolucion_gdh.index')->with('success', 'Resolución GDH eliminada correctamente.');
    }
}
