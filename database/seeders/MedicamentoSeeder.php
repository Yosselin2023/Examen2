<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MedicamentoSeeder extends Seeder
{
    public function run(): void
    {
        $medicamentos = [
            [
                'codigo' => 'MED-001',
                'nombre' => 'Paracetamol 500 mg',
                'categoria' => 'Analgesicos',
                'precio' => 25.00,
                'costo' => 15.00,
                'inventario' => 100,
                'imagen' => null,
                'laboratorio' => 'Laboratorios Finlay',
                'fecha_vencimiento' => '2028-12-31',
                'fecha_registro' => now()->toDateString(),
                'numero_lote' => 'LOTE-PAR-001',
            ],
            [
                'codigo' => 'MED-002',
                'nombre' => 'Amoxicilina 500 mg',
                'categoria' => 'Antibioticos',
                'precio' => 85.00,
                'costo' => 55.00,
                'inventario' => 60,
                'imagen' => null,
                'laboratorio' => 'Laboratorios Andifar',
                'fecha_vencimiento' => '2028-10-30',
                'fecha_registro' => now()->toDateString(),
                'numero_lote' => 'LOTE-AMX-002',
            ],
            [
                'codigo' => 'MED-003',
                'nombre' => 'Suero fisiologico 0.9%',
                'categoria' => 'Sueros',
                'precio' => 45.00,
                'costo' => 28.00,
                'inventario' => 80,
                'imagen' => null,
                'laboratorio' => 'Laboratorios Finlay',
                'fecha_vencimiento' => '2028-08-15',
                'fecha_registro' => now()->toDateString(),
                'numero_lote' => 'LOTE-SUE-003',
            ],
            [
                'codigo' => 'MED-004',
                'nombre' => 'Vitamina C 500 mg',
                'categoria' => 'Vitaminas',
                'precio' => 65.00,
                'costo' => 40.00,
                'inventario' => 50,
                'imagen' => null,
                'laboratorio' => 'Laboratorios Andifar',
                'fecha_vencimiento' => '2029-01-20',
                'fecha_registro' => now()->toDateString(),
                'numero_lote' => 'LOTE-VIT-004',
            ],
            [
                'codigo' => 'MED-005',
                'nombre' => 'Gasas esteriles',
                'categoria' => 'Material Quirurgico',
                'precio' => 30.00,
                'costo' => 18.00,
                'inventario' => 120,
                'imagen' => null,
                'laboratorio' => 'Insumos Medicos Honduras',
                'fecha_vencimiento' => null,
                'fecha_registro' => now()->toDateString(),
                'numero_lote' => 'LOTE-GAS-005',
            ],
        ];

        foreach ($medicamentos as $medicamento) {
            DB::table('medicamentos')->updateOrInsert(
                ['codigo' => $medicamento['codigo']],
                array_merge($medicamento, [
                    'created_at' => now(),
                    'updated_at' => now(),
                ])
            );
        }
    }
}