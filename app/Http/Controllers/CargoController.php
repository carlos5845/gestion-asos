<?php

namespace App\Http\Controllers;

use App\Models\Cargo;
use Illuminate\Http\Request;

class CargoController extends Controller
{
    public function index()
    {
        $cargos = Cargo::all();
        return view('cargo.index', compact('cargos'));
    }

    public function create()
    {
        return view('cargo.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'tipo_cargo' => 'required|string|max:45|unique:cargo,tipo_cargo',
        ]);

        Cargo::create($request->all());

        return redirect()->route('cargo.index')->with('success', 'Cargo creado correctamente.');
    }

    public function show($idcargo)
    {
        $cargo = Cargo::findOrFail($idcargo);
        return view('cargo.show', compact('cargo'));
    }

    public function edit($idcargo)
    {
        $cargo = Cargo::findOrFail($idcargo);
        return view('cargo.edit', compact('cargo'));
    }

    public function update(Request $request, $idcargo)
    {
        $request->validate([
            'tipo_cargo' => 'required|string|max:45|unique:cargo,tipo_cargo,' . $idcargo . ',idcargo',
        ]);

        $cargo = Cargo::findOrFail($idcargo);
        $cargo->update($request->all());

        return redirect()->route('cargo.index')->with('success', 'Cargo actualizado correctamente.');
    }

    public function destroy($idcargo)
    {
        $cargo = Cargo::findOrFail($idcargo);
        $cargo->delete();

        return redirect()->route('cargo.index')->with('success', 'Cargo eliminado correctamente.');
    }
}
