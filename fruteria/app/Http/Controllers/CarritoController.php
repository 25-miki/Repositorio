<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Carrito;
use App\Models\Fruta;
use Illuminate\Support\Facades\Auth;

class CarritoController extends Controller
{

    public function index()
    {
        $userId = Auth::id(); // Obtiene el ID del usuario autenticado

        // Obtiene los elementos del carrito para el usuario actual
        $carrito = Carrito::where('user_id', $userId)->with('fruta')->get();

        // Retorna la vista del carrito con los datos
        return view('carrito.index', compact('carrito'));
    }
    
    // Método para añadir fruta al carrito
    public function agregar(Request $request)
    {
        $request->validate([
            'fruta_id' => 'required|exists:frutas,id',
        ]);

        $frutaId = $request->input('fruta_id');
        $userId = Auth::id();

        // Busca si la fruta ya está en el carrito
        $carrito = Carrito::where('user_id', $userId)->where('fruta_id', $frutaId)->first();

        if ($carrito) {
            // Incrementa la cantidad si ya existe
            $carrito->cantidad += 1;
            $carrito->save();
        } else {
            // Crea una nueva entrada en el carrito
            Carrito::create([
                'user_id' => $userId,
                'fruta_id' => $frutaId,
                'cantidad' => 1,
            ]);
        }

        return redirect()->back()->with('success', 'Fruta añadida al carrito.');
    }

    // Método para quitar fruta del carrito
    public function quitar(Request $request)
    {
        $request->validate([
            'fruta_id' => 'required|exists:frutas,id',
        ]);

        $frutaId = $request->input('fruta_id');
        $userId = Auth::id();

        $carrito = Carrito::where('user_id', $userId)->where('fruta_id', $frutaId)->first();

        if ($carrito) {
            if ($carrito->cantidad > 1) {
                // Reduce la cantidad
                $carrito->cantidad -= 1;
                $carrito->save();
            } else {
                // Elimina la fruta del carrito si la cantidad es 1
                $carrito->delete();
            }
        }

        return redirect()->back()->with('success', 'Fruta quitada del carrito.');
    }
}
