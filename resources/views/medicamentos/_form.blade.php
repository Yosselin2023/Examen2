<div class="row g-3">
    
    <div class="col-md-4">
        <label class="form-label required">Código SKU</label>
        <input 
            type="text" 
            name="codigo" 
            class="form-control" 
            value="{{ old('codigo', $medicamento->codigo) }}" 
            required 
            maxlength="50"
        >
    </div>

    
    <div class="col-md-8">
        <label class="form-label required">Nombre</label>
        <input 
            type="text" 
            name="nombre" 
            class="form-control" 
            value="{{ old('nombre', $medicamento->nombre) }}" 
            required
        >
    </div>

   
    <div class="col-md-4">
        <label class="form-label required">Categoría</label>
        <select name="categoria" class="form-select" required>
            <option value="">Seleccione</option>
            @foreach(['Antibióticos', 'Analgésicos', 'Sueros', 'Material Quirúrgico', 'Vitaminas'] as $v)
                <option value="{{ $v }}" @selected(old('categoria', $medicamento->categoria) === $v)>
                    {{ $v }}
                </option>
            @endforeach
        </select>
    </div>

    
    <div class="col-md-4">
        <label class="form-label required">Precio de venta (L.)</label>
        <input 
            type="number" 
            step="0.01" 
            min="0.01" 
            name="precio" 
            class="form-control" 
            value="{{ old('precio', $medicamento->precio) }}" 
            required
        >
    </div>

   
    <div class="col-md-4">
        <label class="form-label required">Costo (L.)</label>
        <input 
            type="number" 
            step="0.01" 
            min="0.01" 
            name="costo" 
            class="form-control" 
            value="{{ old('costo', $medicamento->costo) }}" 
            required
        >
    </div>

   
    <div class="col-md-4">
        <label class="form-label required">Existencias</label>
        <input 
            type="number" 
            min="0" 
            name="inventario" 
            class="form-control" 
            value="{{ old('inventario', $medicamento->inventario ?? 0) }}" 
            required
        >
    </div>

  
    <div class="col-md-4">
        <label class="form-label">Laboratorio</label>
        <input 
            type="text" 
            name="laboratorio" 
            class="form-control" 
            value="{{ old('laboratorio', $medicamento->laboratorio) }}"
        >
    </div>

    
    <div class="col-md-4">
        <label class="form-label">Número de lote</label>
        <input 
            type="text" 
            name="numero_lote" 
            class="form-control" 
            value="{{ old('numero_lote', $medicamento->numero_lote) }}"
        >
    </div>

    
    <div class="col-md-4">
        <label class="form-label">Fecha de vencimiento</label>
        <input 
            type="date" 
            name="fecha_vencimiento" 
            class="form-control" 
            value="{{ old('fecha_vencimiento', $medicamento->fecha_vencimiento?->format('Y-m-d')) }}"
        >
    </div>

  
    <div class="col-md-4">
        <label class="form-label">Fecha de registro</label>
        <input 
            type="date" 
            name="fecha_registro" 
            class="form-control" 
            value="{{ old('fecha_registro', $medicamento->fecha_registro?->format('Y-m-d')) }}"
        >
    </div>

    <div class="col-md-4">
        <label class="form-label">Fotografía (JPG, PNG o WEBP; máximo 5 MB)</label>
        <input 
            type="file" 
            name="imagen" 
            accept=".jpg,.jpeg,.png,.webp" 
            class="form-control"
        >
        @if($medicamento->imagen)
            <img src="{{ asset('storage/' . $medicamento->imagen) }}" class="small-img mt-2" alt="Imagen del medicamento">
        @endif
    </div>
</div>