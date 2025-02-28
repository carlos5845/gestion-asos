<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use Illuminate\Http\Request;

class CategoriaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categorias = Categoria::all();
        return view('categorias.index', compact('categorias'));
    }

    public function create()
    {
        return view('categorias.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'tipo' => 'required|string|max:45',
        ]);

        Categoria::create($request->all());

        return redirect()->route('categorias.index')->with('success', 'Categoría creada correctamente.');
    }

    public function show(Categoria $idcategoria)
    {
        return view('categorias.show', compact('idcategoria'));
    }

    public function edit(Categoria $idcategoria)
    {
        return view('categorias.edit', compact('idcategoria'));
    }

    public function update(Request $request, Categoria $idcategoria)
    {
        $request->validate([
            'tipo' => 'required|string|max:45',
        ]);

        $idcategoria->update($request->all());

        return redirect()->route('categorias.index')->with('success', 'Categoría actualizada correctamente.');
    }

    public function destroy(Categoria $idcategoria)
    {
        $idcategoria->delete();
        return redirect()->route('categorias.index')->with('success', 'Categoría eliminada correctamente.');
    }
}
