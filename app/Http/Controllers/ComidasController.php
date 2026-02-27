<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Comida;
use App\Models\TipoComida;

class ComidasController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()

    {
        $comidas = Comida::with('tipoComida')->get();
        return view('comidas.index', compact('comidas'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $tiposComida = TipoComida::all();
        return view('comidas.create', compact('tiposComida'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
       $request->validate([
            'nombre_comida' => 'required',
            'costo' => 'required|numeric',
            'detalle_comida' => 'required',
            'id_tipo_comida' => 'required|exists:tb_tipo_comida,id_tipo_comida',
        ]);

        Comida::create($request->all());

        return redirect()->route('comidas.index')
                         ->with('success', 'Comida creada exitosamente.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $comida = Comida::findOrFail($id);
        return view('comidas.show', compact('comida'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $comida = Comida::findOrFail($id);
        $tiposComida = TipoComida::all();
        return view('comidas.edit', compact('comida', 'tiposComida'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'nombre_comida' => 'required',
            'costo' => 'required|numeric',
            'detalle_comida' => 'required',
            'id_tipo_comida' => 'required|exists:tb_tipo_comida,id_tipo_comida',
        ]); 
        $comida = Comida::findOrFail($id);
        $comida->update($request->all());

        return redirect()->route('comidas.index')
                         ->with('success', 'Comida actualizada exitosamente.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    { 
        $comida = Comida::findOrFail($id);
        $comida->delete();

        return redirect()->route('comidas.index')
                         ->with('success', 'Comida eliminada exitosamente.');
    }
}
