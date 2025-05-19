<?php

namespace App\Http\Controllers;

use App\Models\Empleado;
use App\Models\Departamento;
use Illuminate\Http\Request;

class EmpleadoController extends Controller
{
    public function index()
    {
        $empleados = Empleado::with('departamento')->get();
        return view('empleados.index', compact('empleados'));
    }

    public function create()
    {
        $departamentos = Departamento::all();
        return view('empleados.create', compact('departamentos'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nombre' => 'required',
            'email' => 'required|email|unique:empleados,email',
            'dni' => 'required|unique:empleados,dni',
            'departamento_id' => 'required|exists:departamentos,id',
        ]);
        Empleado::create($validated);
        return redirect()->route('empleados.index')->with('success', 'Empleado creado correctamente.');
    }

    public function show(Empleado $empleado)
    {
        $empleado->load('departamento');
        return view('empleados.show', compact('empleado'));
    }

    public function edit(Empleado $empleado)
    {
        $departamentos = Departamento::all();
        return view('empleados.edit', compact('empleado', 'departamentos'));
    }

    public function update(Request $request, Empleado $empleado)
    {
        $validated = $request->validate([
            'nombre' => 'required',
            'email' => 'required|email|unique:empleados,email,' . $empleado->id,
            'dni' => 'required|unique:empleados,dni,' . $empleado->id,
            'departamento_id' => 'required|exists:departamentos,id',
        ]);
        $empleado->update($validated);
        return redirect()->route('empleados.index')->with('success', 'Empleado actualizado correctamente.');
    }

    public function destroy(Empleado $empleado)
    {
        $empleado->delete();
        return redirect()->route('empleados.index')->with('success', 'Empleado eliminado correctamente.');
    }
}
