@extends('layouts.admin')

@section('titulo', 'Registrar Empleado')

@section('contenido')
<div class="d-flex justify-content-between align-items-center mb-3">
    <div>
        <h1 class="mt-2">Registrar Empleado</h1>
        <p class="text-muted">Complete la información solicitada.</p>
    </div>
    <a href="{{ route('empleados.index') }}" class="btn btn-outline-secondary">
        <i class="bi bi-arrow-left"></i> Volver
    </a>
</div>

<div class="card">
    <div class="card-header">
        <i class="bi bi-clipboard2-plus me-1"></i> Datos del empleado
    </div>
    <div class="card-body">
        <form method="POST" action="{{ route('empleados.store') }}" enctype="multipart/form-data">
            @csrf
            
            @include('empleados._form')

            <div class="mt-4">
                <button type="submit" class="btn btn-primary">
                    <i class="bi bi-save me-1"></i> Guardar
                </button>
                <a href="{{ route('empleados.index') }}" class="btn btn-light">
                    Cancelar
                </a>
            </div>
        </form>
    </div>
</div>
@endsection