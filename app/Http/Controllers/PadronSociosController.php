<?php

namespace App\Http\Controllers;

use App\Models\PadronSocios;
use Illuminate\Http\Request;
use App\Models\Grupo;
use Illuminate\Support\Facades\Storage;

class PadronSociosController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $padron_socios = PadronSocios::with('grupo')->get();
        return view('padron_socios.index', compact('padron_socios'));
    }

    public function create()
    {
        $grupos = Grupo::all();
        return view('padron_socios.create', compact('grupos'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'grupo_idgrupo' => 'required|exists:grupo,idgrupo',
            'archivo_padron' => 'nullable|file|mimes:pdf,doc,docx|max:2048'
        ]);

        $archivoPath = null;

        if ($request->hasFile('archivo_padron')) {
            $archivoPath = $request->file('archivo_padron')->store('padrones', 'public');
        }

        PadronSocios::create([
            'grupo_idgrupo' => $request->grupo_idgrupo,
            'archivo_padron' => $archivoPath
        ]);

        return redirect()->route('padron_socios.index')->with('success', 'Padrón de Socios creado correctamente.');
    }

    public function show($idpadron_socios)
    {
        $padron = PadronSocios::with('grupo')->findOrFail($idpadron_socios);
        return view('padron_socios.show', compact('padron'));
    }

    public function edit($idpadron_socios)
    {
        $padron = PadronSocios::findOrFail($idpadron_socios);
        $grupos = Grupo::all();
        return view('padron_socios.edit', compact('padron', 'grupos'));
    }

    public function update(Request $request, $idpadron_socios)
    {
        $request->validate([
            'grupo_idgrupo' => 'required|exists:grupo,idgrupo',
            'archivo_padron' => 'nullable|file|mimes:pdf,doc,docx|max:2048'
        ]);

        $padron = PadronSocios::findOrFail($idpadron_socios);

        if ($request->hasFile('archivo_padron')) {
            if ($padron->archivo_padron) {
                Storage::disk('public')->delete($padron->archivo_padron);
            }
            $archivoPath = $request->file('archivo_padron')->store('padrones', 'public');
            $padron->archivo_padron = $archivoPath;
        }

        $padron->grupo_idgrupo = $request->grupo_idgrupo;
        $padron->save();

        return redirect()->route('padron_socios.index')->with('success', 'Padrón de Socios actualizado correctamente.');
    }

    public function destroy($idpadron_socios)
    {
        $padron = PadronSocios::findOrFail($idpadron_socios);

        if ($padron->archivo_padron) {
            Storage::disk('public')->delete($padron->archivo_padron);
        }

        $padron->delete();

        return redirect()->route('padron_socios.index')->with('success', 'Padrón de Socios eliminado correctamente.');
    }
}
