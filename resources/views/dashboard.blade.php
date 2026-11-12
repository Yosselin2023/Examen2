@extends('layouts.admin')

@section('titulo', 'Dashboard')

@section('contenido')
<h1 class="mt-2 mb-1">Dashboard Gerencial</h1>
<p class="text-muted">Resumen general de DISFARMA Honduras.</p>

<div class="row g-4 mt-2">
    <div class="col-xl-3 col-md-6">
        <div class="card text-white bg-primary h-100">
            <div class="card-body">
                <div class="d-flex justify-content-between">
                    <div>
                        <div class="small">Medicamentos en catálogo</div>
                        <div class="fs-2 fw-bold">{{ $totalMedicamentos }}</div>
                    </div>
                    <i class="bi bi-capsule fs-1 opacity-50"></i>
                </div>
            </div>
            <div class="card-footer d-flex align-items-center justify-content-between">
                <a class="small text-white" href="{{ route('medicamentos.index') }}">Ver medicamentos</a>
                <i class="bi bi-arrow-right text-white"></i>
            </div>
        </div>
    </div>

    <div class="col-xl-3 col-md-6">
        <div class="card text-white bg-success h-100">
            <div class="card-body">
                <div class="d-flex justify-content-between">
                    <div>
                        <div class="small">Proveedores activos</div>
                        <div class="fs-2 fw-bold">{{ $totalProveedores }}</div>
                    </div>
                    <i class="bi bi-truck fs-1 opacity-50"></i>
                </div>
            </div>
            <div class="card-footer d-flex align-items-center justify-content-between">
                <a class="small text-white" href="{{ route('proveedores.index') }}">Ver proveedores</a>
                <i class="bi bi-arrow-right text-white"></i>
            </div>
        </div>
    </div>

    <div class="col-xl-3 col-md-6">
        <div class="card text-white bg-warning h-100">
            <div class="card-body">
                <div class="d-flex justify-content-between">
                    <div>
                        <div class="small">Personal en nómina</div>
                        <div class="fs-2 fw-bold">{{ $totalEmpleados }}</div>
                    </div>
                    <i class="bi bi-people fs-1 opacity-50"></i>
                </div>
            </div>
            <div class="card-footer d-flex align-items-center justify-content-between">
                <a class="small text-white" href="{{ route('empleados.index') }}">Ver empleados</a>
                <i class="bi bi-arrow-right text-white"></i>
            </div>
        </div>
    </div>

    <div class="col-xl-3 col-md-6">
        <div class="card text-white h-100" style="background:#455a64">
            <div class="card-body">
                <div class="d-flex justify-content-between">
                    <div>
                        <div class="small">Valor del inventario</div>
                        <div class="fs-4 fw-bold">L. {{ number_format((float)$valorInventario, 2) }}</div>
                    </div>
                    <i class="bi bi-cash-stack fs-1 opacity-50"></i>
                </div>
            </div>
            <div class="card-footer d-flex align-items-center justify-content-between">
                <a class="small text-white" href="{{ route('medicamentos.index') }}">Consultar inventario</a>
                <i class="bi bi-arrow-right text-white"></i>
            </div>
        </div>
    </div>
</div>

<div class="card mt-4">
    <div class="card-body">
        <h5 class="card-title">Bienvenido al sistema DISFARMA</h5>
        <p class="mb-0">Desde el menú lateral puede administrar el catálogo e inventario de medicamentos, los proveedores mayoristas y el personal farmacéutico.</p>
    </div>
</div>
@endsection