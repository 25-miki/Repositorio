<?php

namespace App\Http\Controllers;


use App\Models\Fruta;
use Illuminate\Http\Request;

class FrutaController extends Controller
{
    public function index(Request $request)
    {
    // Si hay una estación proporcionada, filtrar por ella
    $estacion = $request->query('estacion');

    if ($estacion) {
        $frutas = Fruta::where('estacion', $estacion)->get();
    } else {
        // Si no hay estación, mostrar todas las frutas
        $frutas = Fruta::all();
    }

    // Retornar la vista principal con las frutas y la estación actual
    return view('frutas.index', compact('frutas', 'estacion'));

    
    }


    public function create()
    {
        return view('frutas.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required',
            'foto'=> 'required',
            'estacion' => 'required',
            'precio' => 'required|numeric',
            'unidades' => 'required|integer',
        ]);

        Fruta::create($request->all());
        return redirect()->route('frutas.index');
    }

    public function edit(Fruta $fruta)
    {
        return view('frutas.edit', compact('fruta'));
    }

    public function update(Request $request, Fruta $fruta)
    {
        $request->validate([
            'nombre' => 'required',
            'estacion' => 'required',
            'foto'=> 'required',
            'precio' => 'required|numeric',
            'unidades' => 'required|integer',
        ]);

        $fruta->update($request->all());
        return redirect()->route('frutas.index');
    }

    public function destroy(Fruta $fruta)
    {
        $fruta->delete();
        return redirect()->route('frutas.index');
    }


    // app/Http/Controllers/FrutaController.php

    public function estaciones($estacion)
    {
        // Filtrar las frutas por la estación proporcionada
        $frutas = Fruta::where('estacion', $estacion)->get();
    
        // Retornar la vista con las frutas filtradas
        return view('frutas.index', compact('frutas', 'estacion'));
    }
    

}
