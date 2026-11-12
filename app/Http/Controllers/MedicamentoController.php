<?php

namespace App\Http\Controllers;

use App\Models\Medicamento;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rule;

class MedicamentoController extends Controller
{
    private function reglas($id = null)
    {
        return [
            'codigo' => [
                'required', 
                'string', 
                'max:50', 
                Rule::unique('medicamentos', 'codigo')->ignore($id)
            ],
            'nombre' => 'required|string|max:255',
            'categoria' => 'required|in:Antibióticos,Analgésicos,Sueros,Material Quirúrgico,Vitaminas',
            'precio' => 'required|numeric|gt:0',
            'costo' => 'required|numeric|gt:0',
            'inventario' => 'required|integer|min:0',
            'imagen' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:5120',
            'laboratorio' => 'nullable|string|max:255',
            'fecha_vencimiento' => 'nullable|date',
            'fecha_registro' => 'nullable|date',
            'numero_lote' => 'nullable|string|max:80'
        ];
    }

    public function index(Request $request)
    {
        $medicamentos = Medicamento::when($request->buscar, function ($q, $v) {
            $q->where('nombre', 'like', "%$v%")
              ->orWhere('codigo', 'like', "%$v%");
        })
        ->latest()
        ->paginate(10)
        ->withQueryString();

        return view('medicamentos.index', compact('medicamentos'));
    }

    public function create()
    {
        return view('medicamentos.create', ['medicamento' => new Medicamento]);
    }

    public function store(Request $request)
    {
        $data = $request->validate($this->reglas());

        if ($request->hasFile('imagen')) {
            $data['imagen'] = $request->file('imagen')->store('medicamentos', 'public');
        }

        Medicamento::create($data);

        return redirect()->route('medicamentos.index')
                         ->with('success', 'Medicamento registrado correctamente.');
    }

    public function edit(Medicamento $medicamento)
    {
        return view('medicamentos.edit', compact('medicamento'));
    }

    public function update(Request $request, Medicamento $medicamento)
    {
        $data = $request->validate($this->reglas($medicamento->id));

        if ($request->hasFile('imagen')) {
            if ($medicamento->imagen) {
                Storage::disk('public')->delete($medicamento->imagen);
            }
            $data['imagen'] = $request->file('imagen')->store('medicamentos', 'public');
        }

        $medicamento->update($data);

        return redirect()->route('medicamentos.index')
                         ->with('success', 'Medicamento actualizado correctamente.');
    }

    public function destroy(Medicamento $medicamento)
    {
        if ($medicamento->imagen) {
            Storage::disk('public')->delete($medicamento->imagen);
        }

        $medicamento->delete();

        return redirect()->route('medicamentos.index')
                         ->with('success', 'Medicamento eliminado.');
    }
}