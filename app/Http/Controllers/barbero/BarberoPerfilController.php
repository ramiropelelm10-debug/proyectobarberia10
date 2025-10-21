<?php

namespace App\Http\Controllers;

use App\Models\Barbero;
use Illuminate\Http\Request;

class BarberoPerfilController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        // 🔹 Si más adelante implementas login con roles, podrías hacer:
        // $barbero = auth()->user()->barbero;
        // Por ahora lo haremos con un ID fijo o parámetro simulado.

        $barbero = Barbero::findOrFail(1); // temporal, cambia a auth()->user()->barbero cuando tengas login

        return view('barbero.perfil.show', compact('barbero'));
    }

    //  Mostrar formulario de edición del perfil
    public function edit(string $id)
    { {
            $barbero = Barbero::findOrFail(1); // igual, más adelante usarás el barbero autenticado

            return view('barbero.perfil.edit', compact('barbero'));
        }
    }

    /**
     * Update the specified resource in storage.
     */
   public function update(Request $request)
    {
        $barbero = Barbero::findOrFail(1);

        $request->validate([
            'nombre' => 'required|string|max:255',
            'apellido' => 'required|string|max:255',
            'email' => 'required|email|unique:barberos,email,'.$barbero->id,
            'especialidad' => 'required|string|max:255',
        ]);

        $barbero->update($request->all());

        return redirect()->route('barbero.perfil.show')->with('success', 'Perfil actualizado correctamente');
    }
}
