<?php

namespace App\Http\Controllers;

use App\Models\Socio;
use Illuminate\Http\Request;
use App\Models\Grupo;

class SocioController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $socios = Socio::with('grupo')->get();
        return view('socio.index', compact('socios'));
    }

    public function create()
    {
        $grupos = Grupo::all();
        return view('socio.create', compact('grupos'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'dni' => 'required|string|max:8|unique:socio,dni',
            'nombre' => 'required|string|max:45',
            'apellido_pat' => 'required|string|max:45',
            'apellido_mat' => 'nullable|string|max:45',
            'departamento' => 'required|string|max:45',
            'provincia' => 'required|string|max:45',
            'distrito' => 'nullable|string|max:45',
            'grupo_idgrupo' => 'required|exists:grupo,idgrupo',
            'cod_puesto' => 'nullable|string|max:7',
            'rubro' => 'required|string|max:75',
            'estado' => 'required|boolean',
            'observacion' => 'nullable|string',
        ]);

        Socio::create($request->all());

        return redirect()->route('socio.index')->with('success', 'Socio creado correctamente.');
    }

    public function show($idsocio)
    {
        $socio = Socio::with('grupo')->findOrFail($idsocio);
        return view('socio.show', compact('socio'));
    }

    public function edit($idsocio)
    {
        $socio = Socio::findOrFail($idsocio);
        $grupos = Grupo::all();
        return view('socio.edit', compact('socio', 'grupos'));
    }

    public function update(Request $request, $idsocio)
    {
        $request->validate([
            'dni' => 'required|string|max:8|unique:socio,dni,' . $idsocio . ',idsocio',
            'nombre' => 'required|string|max:45',
            'apellido_pat' => 'required|string|max:45',
            'apellido_mat' => 'nullable|string|max:45',
            'departamento' => 'required|string|max:45',
            'provincia' => 'required|string|max:45',
            'distrito' => 'nullable|string|max:45',
            'grupo_idgrupo' => 'required|exists:grupo,idgrupo',
            'cod_puesto' => 'nullable|string|max:7',
            'rubro' => 'required|string|max:75',
            'estado' => 'required|boolean',
            'observacion' => 'nullable|string',
        ]);

        $socio = Socio::findOrFail($idsocio);
        $socio->update($request->all());

        return redirect()->route('socio.index')->with('success', 'Socio actualizado correctamente.');
    }

    public function destroy($idsocio)
    {
        $socio = Socio::findOrFail($idsocio);
        $socio->delete();

        return redirect()->route('socio.index')->with('success', 'Socio eliminado correctamente.');
    }
}
