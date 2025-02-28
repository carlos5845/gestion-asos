<?php

namespace App\Http\Controllers;

use App\Models\Grupo;
use Illuminate\Http\Request;
use App\Models\Agrupamiento;
use App\Models\Categoria;

class GrupoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $grupos = Grupo::with(['agrupamiento', 'categoria'])->get();
        return view('grupo.index', compact('grupos'));
    }

    public function create()
    {
        $agrupamientos = Agrupamiento::all();
        $categorias = Categoria::all();
        return view('grupo.create', compact('agrupamientos', 'categorias'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'etiqueta_grupo' => 'required|string|max:7|unique:grupo,etiqueta_grupo',
            'nombre_grupo' => 'required|string|max:95',
            'ubicacion' => 'required|string|max:45',
            'agrupamiento_idagrupamiento' => 'required|exists:agrupamiento,idagrupamiento',
            'categoria_idcategoria' => 'required|exists:categorias,idcategoria',
        ]);

        Grupo::create($request->all());

        return redirect()->route('grupo.index')->with('success', 'Grupo creado correctamente.');
    }

    public function show($idgrupo)
    {
        $grupo = Grupo::with(['agrupamiento', 'categoria'])->findOrFail($idgrupo);
        return view('grupo.show', compact('grupo'));
    }

    public function edit($idgrupo)
    {
        $grupo = Grupo::findOrFail($idgrupo);
        $agrupamientos = Agrupamiento::all();
        $categorias = Categoria::all();
        return view('grupo.edit', compact('grupo', 'agrupamientos', 'categorias'));
    }

    public function update(Request $request, $idgrupo)
    {
        $request->validate([
            'etiqueta_grupo' => 'required|string|max:7|unique:grupo,etiqueta_grupo,' . $idgrupo . ',idgrupo',
            'nombre_grupo' => 'required|string|max:95',
            'ubicacion' => 'required|string|max:45',
            'agrupamiento_idagrupamiento' => 'required|exists:agrupamiento,idagrupamiento',
            'categoria_idcategoria' => 'required|exists:categorias,idcategoria',
        ]);

        $grupo = Grupo::findOrFail($idgrupo);
        $grupo->update($request->all());

        return redirect()->route('grupo.index')->with('success', 'Grupo actualizado correctamente.');
    }

    public function destroy($idgrupo)
    {
        $grupo = Grupo::findOrFail($idgrupo);
        $grupo->delete();

        return redirect()->route('grupo.index')->with('success', 'Grupo eliminado correctamente.');
    }
}
