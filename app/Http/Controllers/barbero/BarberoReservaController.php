<?php

namespace App\Http\Controllers\barbero;

use App\Http\Controllers\Controller;
use App\Models\Barbero;
use Illuminate\Http\Request;
use App\Models\Reserva;

class BarberoReservaController extends Controller
{
    /**
     * Mostrar todas las reservas del barbero logueado
     */
    public function index()

    {    // Antes: $reservas = Reserva::all();
        $user_id = 1;
        $reservas = Reserva::where('id_barbero', $user_id)->paginate(10); // 10 reservas por página

        return view('barbero.reserva.index', compact('reservas', 'user_id'));
    }

    /**
     * Mostrar el formulario para crear una reserva (opcional)
     */
    public function create()
    {
        return view('barbero.reservas.create');
    }

    /**
     * Guardar una nueva reserva
     */
    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required|string|max:100',
            'apellido' => 'required|string|max:100',
            'email' => 'required|email|unique:barberos',
            'especialidad' => 'required|string|max:100',
        ]);

        Barbero::create($request->only(['nombre', 'apellido', 'email', 'especialidad']));

        return redirect()->route('barberos.index')->with('success', 'Barbero creado correctamente.');
    }
    /**
     * Mostrar detalles de una reserva
     */
    public function show($id)
    {
        $reserva = Reserva::findOrFail($id);
        return view('barbero.reservas.show', compact('reserva'));
    }

    /**
     * Formulario para editar una reserva
     */
    public function edit($id)
    {
        $reserva = Reserva::findOrFail($id);
        $user_id=1;
        return view('barbero.reserva.edit', compact('reserva','user_id'));
    }

    /**
     * Actualizar una reserva
     */
    public function update(Request $request, $id)
    {
        $barbero = Barbero::findOrFail($id);

        $request->validate([
            'nombre' => 'required|string|max:100',
            'apellido' => 'required|string|max:100',
            'email' => 'required|email|unique:barberos,email,' . $barbero->id,
            'especialidad' => 'required|string|max:100',
        ]);

        $barbero->update($request->only(['nombre', 'apellido', 'email', 'especialidad']));

        return redirect()->route('barberos.index')->with('success', 'Barbero actualizado correctamente.');
    }

    /**
     * Eliminar una reserva
     */
    public function destroy($id)
    {
        $barbero = Barbero::findOrFail($id);
        $barbero->delete();

        return redirect()->route('barberos.index')->with('success', 'Barbero eliminado correctamente.');
    }
}
