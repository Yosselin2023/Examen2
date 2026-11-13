<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class EmpleadoSeeder extends Seeder
{
    public function run(): void
    {
        $empleados = [
            [
                'identidad' => '0801199912345',
                'nombre' => 'Carlos',
                'apellido' => 'Martinez',
                'correo' => 'carlos@disfarma.hn',
                'cargo' => 'Regente Farmaceutico',
                'salario' => 25000.00,
                'fecha_ingreso' => '2024-01-15',
                'estado' => 'Activo',
            ],
            [
                'identidad' => '0801199912346',
                'nombre' => 'Ana',
                'apellido' => 'Lopez',
                'correo' => 'ana@disfarma.hn',
                'cargo' => 'Asistente de Farmacia',
                'salario' => 15000.00,
                'fecha_ingreso' => '2024-03-10',
                'estado' => 'Activo',
            ],
            [
                'identidad' => '0801199912347',
                'nombre' => 'Jose',
                'apellido' => 'Hernandez',
                'correo' => 'jose@disfarma.hn',
                'cargo' => 'Jefe de Bodega',
                'salario' => 18000.00,
                'fecha_ingreso' => '2023-08-01',
                'estado' => 'Activo',
            ],
            [
                'identidad' => '0801199912348',
                'nombre' => 'Maria',
                'apellido' => 'Garcia',
                'correo' => 'maria@disfarma.hn',
                'cargo' => 'Despachador',
                'salario' => 13000.00,
                'fecha_ingreso' => '2025-02-01',
                'estado' => 'Activo',
            ],
            [
                'identidad' => '0801199912349',
                'nombre' => 'Luis',
                'apellido' => 'Flores',
                'correo' => 'luis@disfarma.hn',
                'cargo' => 'Cajero',
                'salario' => 14000.00,
                'fecha_ingreso' => '2025-05-12',
                'estado' => 'Activo',
            ],
        ];

        foreach ($empleados as $empleado) {
            DB::table('empleados')->updateOrInsert(
                ['identidad' => $empleado['identidad']],
                array_merge($empleado, [
                    'created_at' => now(),
                    'updated_at' => now(),
                ])
            );
        }
    }
}