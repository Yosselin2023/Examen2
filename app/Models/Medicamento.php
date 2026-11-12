<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Medicamento extends Model
{
    protected $table = 'medicamentos';

    protected $fillable = [
        'codigo',
        'nombre',
        'categoria',
        'precio',
        'costo',
        'inventario',
        'imagen',
        'laboratorio',
        'fecha_vencimiento',
        'fecha_registro',
        'numero_lote'
    ];

    protected $casts = [
        'precio' => 'decimal:2',
        'costo' => 'decimal:2',
        'fecha_vencimiento' => 'date',
        'fecha_registro' => 'date'
    ];
}