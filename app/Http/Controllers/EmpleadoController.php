<?php

namespace App\Http\Controllers;

use App\Models\Empleado;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class EmpleadoController extends Controller
{
    private function reglas($id = null)
    {
        return [
            'identidad' => [
                'required', 
                'digits:13', 
                Rule::unique('empleados', 'identidad')->ignore($id)
            ],
            'nombre' => 'required|string|max:150',
            'apellido' => 'required|string|max:150',
            'correo' => 'nullable|email|max:255',
            'cargo' => 'required|in:Regente Farmacéutico,Asistente de Farmacia,Jefe de Bodega,Despachador,Cajero',
            'salario' => 'required|numeric|gt:0',
            'fecha_ingreso' => 'required|date|before_or_equal:today',
            'estado' => 'required|in:Activo,Inactivo'
        ];
    }

    public function index(Request $request)
    {
        $empleados = Empleado::when($request->buscar, function ($q, $v) {
            $q->where(function ($filtro) use ($v) {
                $filtro->where('nombre', 'like', "%$v%")
                       ->orWhere('apellido', 'like', "%$v%")
                       ->orWhere('identidad', 'like', "%$v%");
            });
        })
        ->latest()
        ->paginate(10)
        ->withQueryString();

        return view('empleados.index', compact('empleados'));
    }

    public function create()
    {
        return view('empleados.create', ['empleado' => new Empleado]);
    }

    public function store(Request $request)
    {
        Empleado::create($request->validate($this->reglas()));

        return redirect()->route('empleados.index')
                         ->with('success', 'Empleado registrado correctamente.');
    }

    public function edit(Empleado $empleado)
    {
        return view('empleados.edit', compact('empleado'));
    }

    public function update(Request $request, Empleado $empleado)
    {
        $empleado->update($request->validate($this->reglas($empleado->id)));

        return redirect()->route('empleados.index')
                         ->with('success', 'Empleado actualizado correctamente.');
    }

    public function destroy(Empleado $empleado)
    {
        $empleado->delete();

        return redirect()->route('empleados.index')
                         ->with('success', 'Empleado eliminado.');
    }
}