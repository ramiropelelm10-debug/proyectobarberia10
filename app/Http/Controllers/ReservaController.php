<?php

namespace App\Http\Controllers;

use App\Models\Barbero;
use App\Models\Cliente;
use App\Models\Reserva;
use Illuminate\Http\Request;

class ReservaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $reservas = Reserva::all(); //trae todas las reservas de la base de datos 

        return view('admin.reserva.index', compact('reservas'));
        //muestra la pagina donde se ve todas reservas  y pasan los datos 
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    { {
            // 1. Obtener todos los clientes de la base de datos
            // Esto es para poder elegir en el formulario quién hace la reserva
            $clientes = Cliente::all();

            // 2. Obtener todos los barberos de la base de datos
            // Esto es para poder elegir en el formulario quién atenderá la reserva
            $barberos = Barbero::all();

            // 3. Retornar la vista del formulario de creación de reserva
            // 'compact' envía las variables $clientes y $barberos a la vista
            // para que se puedan mostrar en los select del formulario
            return view('admin.reserva.create', compact('clientes', 'barberos'));
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // 1. Validar los datos que vienen del formulario
        // Nos aseguramos de que el usuario haya seleccionado cliente, barbero
        // y que la fecha y hora sean correctas
        $request->validate([
            'id_cliente' => 'required|exists:clientes,id',  // obligatorio y debe existir en la tabla clientes
            'id_barbero' => 'required|exists:barberos,id', // obligatorio y debe existir en la tabla barberos
            'fecha_hora' => 'required|date',               // obligatorio y debe ser una fecha válida
            'estado' => 'required|in:pendiente,confirmada,cancelada', // opcionalmente validamos el estado
        ]);

        // 2. Crear la nueva reserva en la base de datos usando el modelo Reserva
        // $request->all() toma todos los campos enviados del formulario
        Reserva::create($request->all());

        // 3. Redirigir al listado de reservas con un mensaje de éxito
        return redirect()->route('reserva.index')->with('success', 'Reserva creada correctamente');
    }

    /**
     * Display the specified resource.
     */
    public function show(Reserva $reserva) {}

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Reserva $reserva)
    {
        // 1. Trae todos los clientes para poder seleccionar quién hace la reserva
        $clientes = Cliente::all();

        // 2. Trae todos los barberos para poder seleccionar quién atenderá la reserva
        $barberos = Barbero::all();

        // 3. Retorna la vista del formulario de edición de reserva
        // Pasa las variables $reserva, $clientes y $barberos para usarlas en los campos del formulario
        return view('admin.reserva.edit', compact('reserva', 'clientes', 'barberos'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Reserva $reserva)
    {
        // 1. Validar los datos enviados por el formulario
        $request->validate([
            'fecha_hora' => 'required|date', // obligatorio y debe ser fecha/hora válida
            'id_cliente' => 'required|exists:clientes,id', // obligatorio y debe existir en clientes
            'id_barbero' => 'required|exists:barberos,id', // obligatorio y debe existir en barberos
            'estado' => 'required|in:pendiente,confirmada,cancelada', // obligatorio y solo estos valores
        ]);

        // 2. Actualizar la reserva con los datos validados
        $reserva->update($request->all());

        // 3. Redirigir al listado de reservas con mensaje de éxito
        return redirect()->route('reserva.index')->with('success', 'Reserva actualizada correctamente');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Reserva $reserva)
    {
        // Elimina la reserva de la base de datos
        $reserva->delete();

        // Redirige al listado de reservas y muestra un mensaje de éxito
        return redirect()->route('reserva.index')->with('success', 'Reserva eliminada correctamente');
    }
}
