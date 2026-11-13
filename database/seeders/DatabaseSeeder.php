<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // Crear o actualizar el administrador sin duplicarlo
        User::updateOrCreate(
            ['email' => 'admin@disfarma.hn'],
            [
                'name' => 'Administrador DISFARMA',
                'password' => Hash::make('Disfarma2026!'),
            ]
        );

        // Cargar los datos de demostración
        $this->call([
            MedicamentoSeeder::class,
            ProveedorSeeder::class,
            EmpleadoSeeder::class,
        ]);
    }
}
