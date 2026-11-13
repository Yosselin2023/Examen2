<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProveedorSeeder extends Seeder
{
    public function run(): void
    {
        $proveedores = [
            [
                'rtn' => '08011999123456',
                'empresa' => 'Distribuidora Farmaceutica Honduras',
                'contacto' => 'Carlos Martínez',
                'telefono' => '98765432',
                'categoria' => 'Farmacos',
                'limite_credito' => 50000.00,
                'dias_credito' => 30,
                'estado' => 'Activo',
            ],
            [
                'rtn' => '08011999123457',
                'empresa' => 'Insumos Medicos del Norte',
                'contacto' => 'Ana Lopez',
                'telefono' => '98765433',
                'categoria' => 'Material Quirurgico',
                'limite_credito' => 30000.00,
                'dias_credito' => 15,
                'estado' => 'Activo',
            ],
            [
                'rtn' => '08011999123458',
                'empresa' => 'Equipos Clínicos S.A.',
                'contacto' => 'Jose Hernandez',
                'telefono' => '98765434',
                'categoria' => 'Equipos',
                'limite_credito' => 75000.00,
                'dias_credito' => 45,
                'estado' => 'Activo',
            ],
            [
                'rtn' => '08011999123459',
                'empresa' => 'Farmaceutica Centroamericana',
                'contacto' => 'María García',
                'telefono' => '98765435',
                'categoria' => 'Farmacos',
                'limite_credito' => 40000.00,
                'dias_credito' => 30,
                'estado' => 'Activo',
            ],
            [
                'rtn' => '08011999123460',
                'empresa' => 'Suministros Hospitalarios',
                'contacto' => 'Luis Flores',
                'telefono' => '98765436',
                'categoria' => 'Material Quirurgico',
                'limite_credito' => 25000.00,
                'dias_credito' => 20,
                'estado' => 'Inactivo',
            ],
        ];

        foreach ($proveedores as $proveedor) {
            DB::table('proveedores')->updateOrInsert(
                ['rtn' => $proveedor['rtn']],
                array_merge($proveedor, [
                    'created_at' => now(),
                    'updated_at' => now(),
                ])
            );
        }
    }
}