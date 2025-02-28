<?php

namespace App\Http\Controllers;

use App\Models\VigenciaPoder;
use Illuminate\Http\Request;
use App\Models\Grupo;
use Illuminate\Support\Facades\Storage;

class VigenciaPoderController extends Controller
{
    public function index()
    {
        $vigencias = VigenciaPoder::with('grupo')->get();
        return view('vigencia_poder.index', compact('vigencias'));
    }

    public function create()
    {
        $grupos = Grupo::all();
        return view('vigencia_poder.create', compact('grupos'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'partida_registral' => 'required|string|max:8|unique:vigencia_poder,partida_registral',
            'archivo_vigencia' => 'nullable|file|mimes:pdf,doc,docx|max:2048',
            'grupo_idgrupo' => 'required|exists:grupo,idgrupo',
        ]);

        $archivoPath = null;
        if ($request->hasFile('archivo_vigencia')) {
            $archivoPath = $request->file('archivo_vigencia')->store('vigencias_poder', 'public');
        }

        VigenciaPoder::create([
            'partida_registral' => $request->partida_registral,
            'archivo_vigencia' => $archivoPath,
            'grupo_idgrupo' => $request->grupo_idgrupo,
        ]);

        return redirect()->route('vigencia_poder.index')->with('success', 'Vigencia de Poder creada correctamente.');
    }

    public function show($idvigencia_poder)
    {
        $vigencia = VigenciaPoder::with('grupo')->findOrFail($idvigencia_poder);
        return view('vigencia_poder.show', compact('vigencia'));
    }

    public function edit($idvigencia_poder)
    {
        $vigencia = VigenciaPoder::findOrFail($idvigencia_poder);
        $grupos = Grupo::all();
        return view('vigencia_poder.edit', compact('vigencia', 'grupos'));
    }

    public function update(Request $request, $idvigencia_poder)
    {
        $request->validate([
            'partida_registral' => 'required|string|max:8|unique:vigencia_poder,partida_registral,' . $idvigencia_poder . ',idvigencia_poder',
            'archivo_vigencia' => 'nullable|file|mimes:pdf,doc,docx|max:2048',
            'grupo_idgrupo' => 'required|exists:grupo,idgrupo',
        ]);

        $vigencia = VigenciaPoder::findOrFail($idvigencia_poder);

        if ($request->hasFile('archivo_vigencia')) {
            if ($vigencia->archivo_vigencia) {
                Storage::disk('public')->delete($vigencia->archivo_vigencia);
            }
            $archivoPath = $request->file('archivo_vigencia')->store('vigencias_poder', 'public');
            $vigencia->archivo_vigencia = $archivoPath;
        }

        $vigencia->partida_registral = $request->partida_registral;
        $vigencia->grupo_idgrupo = $request->grupo_idgrupo;
        $vigencia->save();

        return redirect()->route('vigencia_poder.index')->with('success', 'Vigencia de Poder actualizada correctamente.');
    }

    public function destroy($idvigencia_poder)
    {
        $vigencia = VigenciaPoder::findOrFail($idvigencia_poder);

        if ($vigencia->archivo_vigencia) {
            Storage::disk('public')->delete($vigencia->archivo_vigencia);
        }

        $vigencia->delete();

        return redirect()->route('vigencia_poder.index')->with('success', 'Vigencia de Poder eliminada correctamente.');
    }
}
