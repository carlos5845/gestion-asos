<?php

namespace App\Http\Controllers;

use App\Models\JuntaDirectiva;
use Illuminate\Http\Request;
use App\Models\Cargo;
use App\Models\Grupo;

class JuntaDirectivaController extends Controller
{
    public function index()
    {
        $junta_directiva = JuntaDirectiva::with(['cargo', 'grupo'])->get();
        return view('junta_directiva.index', compact('junta_directiva'));
    }

    public function create()
    {
        $cargos = Cargo::all(); // 🔹 Obtener todos los cargos disponibles
        $grupos = Grupo::all(); // 🔹 Obtener todos los grupos disponibles
        return view('junta_directiva.create', compact('cargos', 'grupos'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'socio_dni' => 'required|string|max:8',
            'nom_apellido' => 'required|string|max:55',
            'cargo_idcargo' => 'required|exists:cargo,idcargo',
            'celular' => 'nullable|string|max:9',
            'grupo_idgrupo' => 'required|exists:grupo,idgrupo',
            'fecha_inicio' => 'nullable|date',
            'fecha_fin' => 'nullable|date',
            'estado' => 'required|boolean',
        ]);

        JuntaDirectiva::create($request->all());

        return redirect()->route('junta_directiva.index')->with('success', 'Miembro agregado correctamente.');
    }

    public function show($idjunta_directiva)
    {
        $miembro = JuntaDirectiva::with(['cargo', 'grupo'])->findOrFail($idjunta_directiva);
        return view('junta_directiva.show', compact('miembro'));
    }

    public function edit($idjunta_directiva)
    {
        $miembro = JuntaDirectiva::findOrFail($idjunta_directiva);
        $cargos = Cargo::all();
        $grupos = Grupo::all();
        return view('junta_directiva.edit', compact('miembro', 'cargos', 'grupos'));
    }

    public function update(Request $request, $idjunta_directiva)
    {
        $request->validate([
            'socio_dni' => 'required|string|max:8',
            'nom_apellido' => 'required|string|max:55',
            'cargo_idcargo' => 'required|exists:cargo,idcargo',
            'celular' => 'nullable|string|max:9',
            'grupo_idgrupo' => 'required|exists:grupo,idgrupo',
            'fecha_inicio' => 'nullable|date',
            'fecha_fin' => 'nullable|date',
            'estado' => 'required|boolean',
        ]);

        $miembro = JuntaDirectiva::findOrFail($idjunta_directiva);
        $miembro->update($request->all());

        return redirect()->route('junta_directiva.index')->with('success', 'Miembro actualizado correctamente.');
    }

    public function destroy($idjunta_directiva)
    {
        $miembro = JuntaDirectiva::findOrFail($idjunta_directiva);
        $miembro->delete();

        return redirect()->route('junta_directiva.index')->with('success', 'Miembro eliminado correctamente.');
    }
}
