<?php

namespace App\Http\Controllers;

use App\Models\Proveedor;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class ProveedorController extends Controller
{
    private function reglas($id = null)
    {
        return [
            'rtn' => [
                'required', 
                'digits:14', 
                Rule::unique('proveedores', 'rtn')->ignore($id)
            ],
            'empresa' => 'required|string|max:255',
            'contacto' => 'required|string|max:255',
            'telefono' => [
                'required', 
                'regex:/^[2389][0-9]{7}$/'
            ],
            'categoria' => 'required|in:Fármacos,Material Quirúrgico,Equipos',
            'limite_credito' => 'required|numeric|min:0',
            'dias_credito' => 'required|in:15,30,45,60',
            'estado' => 'required|in:Activo,Inactivo'
        ];
    }

    public function index(Request $request)
    {
        $proveedores = Proveedor::when($request->buscar, function ($q, $v) {
            $q->where('empresa', 'like', "%$v%")
              ->orWhere('rtn', 'like', "%$v%");
        })
        ->latest()
        ->paginate(10)
        ->withQueryString();

        return view('proveedores.index', compact('proveedores'));
    }

    public function create()
    {
        return view('proveedores.create', ['proveedor' => new Proveedor]);
    }

    public function store(Request $request)
    {
        Proveedor::create($request->validate($this->reglas()));

        return redirect()->route('proveedores.index')
                         ->with('success', 'Proveedor registrado correctamente.');
    }

    public function edit(Proveedor $proveedor)
    {
        return view('proveedores.edit', compact('proveedor'));
    }

    public function update(Request $request, Proveedor $proveedor)
    {
        $proveedor->update($request->validate($this->reglas($proveedor->id)));

        return redirect()->route('proveedores.index')
                         ->with('success', 'Proveedor actualizado correctamente.');
    }

    public function destroy(Proveedor $proveedor)
    {
        $proveedor->delete();

        return redirect()->route('proveedores.index')
                         ->with('success', 'Proveedor eliminado.');
    }
}