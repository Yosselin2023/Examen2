@extends('layouts.admin')

@section('titulo', 'Proveedores')

@section('contenido')
<div class="d-flex flex-wrap justify-content-between align-items-center mb-3">
    <div>
        <h1 class="mt-2 mb-1">Proveedores</h1>
        <p class="text-muted">Administración del módulo de proveedores.</p>
    </div>
    <a class="btn btn-primary" href="{{ route('proveedores.create') }}">
        <i class="bi bi-plus-lg me-1"></i>Nuevo registro
    </a>
</div>

<div class="card mb-4">
    <div class="card-header">
        <i class="bi bi-table me-1"></i>Listado de Proveedores
    </div>
    <div class="card-body">
        <form method="GET" class="row g-2 mb-3">
            <div class="col-md-5">
                <input name="buscar" value="{{ request('buscar') }}" class="form-control" placeholder="Buscar por nombre, código o identificación">
            </div>
            <div class="col-auto">
                <button class="btn btn-outline-primary"><i class="bi bi-search"></i> Buscar</button>
                <a class="btn btn-outline-secondary" href="{{ route('proveedores.index') }}">Limpiar</a>
            </div>
        </form>

        <div class="table-responsive">
            <table class="table table-striped table-hover align-middle">
                <thead class="table-dark">
                    <tr>
                        <th>RTN</th>
                        <th>Empresa</th>
                        <th>Contacto</th>
                        <th>Teléfono</th>
                        <th>Categoría</th>
                        <th>Crédito</th>
                        <th>Estado</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($proveedores as $item)
                    <tr>
                        <td>{{ $item->rtn }}</td>
                        <td>{{ $item->empresa }}</td>
                        <td>{{ $item->contacto }}</td>
                        <td>{{ $item->telefono }}</td>
                        <td>{{ $item->categoria }}</td>
                        <td>L. {{ number_format($item->limite_credito, 2) }} / {{ $item->dias_credito }} días</td>
                        <td>
                            @if($item->estado === 'Activo')
                                <span class="badge bg-success">Activo</span>
                            @else
                                <span class="badge bg-secondary">Inactivo</span>
                            @endif
                        </td>
                        <td class="text-nowrap">
                            <a class="btn btn-sm btn-warning" href="{{ route('proveedores.edit', $item) }}" title="Editar">
                                <i class="bi bi-pencil"></i>
                            </a>
                            <form class="d-inline" method="POST" action="{{ route('proveedores.destroy', $item) }}" onsubmit="return confirm('¿Está seguro de eliminar este registro?')">
                                @csrf 
                                @method('DELETE')
                                <button class="btn btn-sm btn-danger" title="Eliminar">
                                    <i class="bi bi-trash"></i>
                                </button>
                            </form>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="8" class="text-center text-muted py-4">No hay registros para mostrar.</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <div class="d-flex justify-content-end">
            {{ $proveedores->links() }}
        </div>
    </div>
</div>
@endsection