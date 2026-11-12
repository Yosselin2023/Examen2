<?php

namespace App\Http\Controllers;

use App\Models\Empleado;
use App\Models\Medicamento;
use App\Models\Proveedor;

class DashboardController extends Controller
{
    public function index()
    {
        return view('dashboard', [
            'totalMedicamentos' => Medicamento::count(),
            'totalProveedores'  => Proveedor::where('estado', 'Activo')->count(),
            'totalEmpleados'    => Empleado::count(),
            'valorInventario'   => Medicamento::selectRaw('COALESCE(SUM(inventario * precio), 0) as total')->value('total'),
        ]);
    }
}