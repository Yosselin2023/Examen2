@extends('layouts.admin')

@section('titulo', 'Medicamentos')

@section('contenido')
<div class="d-flex flex-wrap justify-content-between align-items-center mb-3">
    <div>
        <h1 class="mt-2 mb-1">Medicamentos</h1>
        <p class="text-muted">Administración del módulo de medicamentos.</p>
    </div>
    <a class="btn btn-primary" href="{{ route('medicamentos.create') }}">
        <i class="bi bi-plus-lg me-1"></i>Nuevo registro
    </a>
</div>

<div class="card mb-4">
    <div class="card-header">
        <i class="bi bi-table me-1"></i>Listado de Medicamentos
    </div>
    <div class="card-body">
        <form method="GET" class="row g-2 mb-3">
            <div class="col-md-5">
                <input name="buscar" value="{{ request('buscar') }}" class="form-control" placeholder="Buscar por nombre, código o identificación">
            </div>
            <div class="col-auto">
                <button class="btn btn-outline-primary"><i class="bi bi-search"></i> Buscar</button>
                <a class="btn btn-outline-secondary" href="{{ route('medicamentos.index') }}">Limpiar</a>
            </div>
        </form>

        <div class="table-responsive">
            <table class="table table-striped table-hover align-middle">
                <thead class="table-dark">
                    <tr>
                        <th>Foto</th>
                        <th>SKU</th>
                        <th>Nombre</th>
                        <th>Categoría</th>
                        <th>Precio</th>
                        <th>Existencias</th>
                        <th>Vencimiento</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($medicamentos as $item)
                    <tr>
                        <td>
                            @if($item->imagen)
                                <img class="small-img" src="{{ asset('storage/'.$item->imagen) }}">
                            @else
                                <span class="text-muted">Sin foto</span>
                            @endif
                        </td>
                        <td>{{ $item->codigo }}</td>
                        <td>{{ $item->nombre }}</td>
                        <td>{{ $item->categoria }}</td>
                        <td>L. {{ number_format($item->precio, 2) }}</td>
                        <td>
                            @if($item->inventario > 20)
                                <span class="badge bg-success">{{ $item->inventario }} Óptimo</span>
                            @elseif($item->inventario >= 10)
                                <span class="badge bg-warning text-dark">{{ $item->inventario }} Moderado</span>
                            @else
                                <span class="badge bg-danger">{{ $item->inventario }} ¡Desabastecimiento!</span>
                            @endif
                        </td>
                        <td>{{ optional($item->fecha_vencimiento)->format('d/m/Y') ?? '—' }}</td>
                        <td class="text-nowrap">
                            <a class="btn btn-sm btn-warning" href="{{ route('medicamentos.edit', $item) }}" title="Editar">
                                <i class="bi bi-pencil"></i>
                            </a>
                            <form class="d-inline" method="POST" action="{{ route('medicamentos.destroy', $item) }}" onsubmit="return confirm('¿Está seguro de eliminar este registro?')">
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
            {{ $medicamentos->links() }}
        </div>
    </div>
</div>
@endsection