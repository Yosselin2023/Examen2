@extends('layouts.admin')

@section('titulo', 'Empleados')

@section('contenido')
<div class="d-flex flex-wrap justify-content-between align-items-center mb-3">
    <div>
        <h1 class="mt-2 mb-1">Empleados</h1>
        <p class="text-muted">Administración del módulo de empleados.</p>
    </div>
    <a class="btn btn-primary" href="{{ route('empleados.create') }}">
        <i class="bi bi-plus-lg me-1"></i> Nuevo registro
    </a>
</div>

<div class="card mb-4">
    <div class="card-header">
        <i class="bi bi-table me-1"></i> Listado de Empleados
    </div>
    <div class="card-body">
        <!-- Buscador -->
        <form method="GET" class="row g-2 mb-3">
            <div class="col-md-5">
                <input 
                    type="text" 
                    name="buscar" 
                    value="{{ request('buscar') }}" 
                    class="form-control" 
                    placeholder="Buscar por nombre, código o identificación"
                >
            </div>
            <div class="col-auto">
                <button type="submit" class="btn btn-outline-primary">
                    <i class="bi bi-search"></i> Buscar
                </button>
                <a class="btn btn-outline-secondary" href="{{ route('empleados.index') }}">
                    Limpiar
                </a>
            </div>
        </form>

        
        <div class="table-responsive">
            <table class="table table-striped table-hover align-middle">
                <thead class="table-dark">
                    <tr>
                        <th>Identidad</th>
                        <th>Nombre</th>
                        <th>Correo</th>
                        <th>Cargo</th>
                        <th>Salario</th>
                        <th>Ingreso</th>
                        <th>Estado</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($empleados as $item)
                        <tr>
                            <td>{{ $item->identidad }}</td>
                            <td>{{ $item->nombre }} {{ $item->apellido }}</td>
                            <td>{{ $item->correo ?? '—' }}</td>
                            <td>
                                <span class="badge bg-info text-dark">{{ $item->cargo }}</span>
                            </td>
                            <td>L. {{ number_format($item->salario, 2) }}</td>
                            <td>{{ $item->fecha_ingreso->format('d/m/Y') }}</td>
                            <td>
                                @if($item->estado === 'Activo')
                                    <span class="badge bg-success">Activo</span>
                                @else
                                    <span class="badge bg-secondary">Inactivo</span>
                                @endif
                            </td>
                            <td class="text-nowrap">
                                <a class="btn btn-sm btn-warning" href="{{ route('empleados.edit', $item) }}" title="Editar">
                                    <i class="bi bi-pencil"></i>
                                </a>
                                <form class="d-inline" method="POST" action="{{ route('empleados.destroy', $item) }}" onsubmit="return confirm('¿Está seguro de eliminar este registro?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger" title="Eliminar">
                                        <i class="bi bi-trash"></i>
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="8" class="text-center text-muted py-4">
                                No hay registros para mostrar.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

      
        <div class="d-flex justify-content-end mt-3">
            {{ $empleados->links() }}
        </div>
    </div>
</div>
@endsection