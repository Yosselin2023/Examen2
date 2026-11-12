<div class="row g-3">
   
    <div class="col-md-4">
        <label class="form-label required">Identidad (13 dígitos)</label>
        <input 
            type="text" 
            name="identidad" 
            maxlength="13" 
            minlength="13" 
            pattern="[0-9]{13}" 
            class="form-control" 
            value="{{ old('identidad', $empleado->identidad) }}" 
            required
        >
    </div>

    
    <div class="col-md-4">
        <label class="form-label required">Nombre</label>
        <input 
            type="text" 
            name="nombre" 
            class="form-control" 
            value="{{ old('nombre', $empleado->nombre) }}" 
            required
        >
    </div>

    <div class="col-md-4">
        <label class="form-label required">Apellido</label>
        <input 
            type="text" 
            name="apellido" 
            class="form-control" 
            value="{{ old('apellido', $empleado->apellido) }}" 
            required
        >
    </div>

    
    <div class="col-md-6">
        <label class="form-label">Correo</label>
        <input 
            type="email" 
            name="correo" 
            class="form-control" 
            value="{{ old('correo', $empleado->correo) }}"
        >
    </div>

   
    <div class="col-md-6">
        <label class="form-label required">Cargo</label>
        <select name="cargo" class="form-select" required>
            <option value="">Seleccione</option>
            @foreach(['Regente Farmacéutico', 'Asistente de Farmacia', 'Jefe de Bodega', 'Despachador', 'Cajero'] as $v)
                <option value="{{ $v }}" @selected(old('cargo', $empleado->cargo) === $v)>
                    {{ $v }}
                </option>
            @endforeach
        </select>
    </div>

    <div class="col-md-4">
        <label class="form-label required">Salario mensual (L.)</label>
        <input 
            type="number" 
            min="0.01" 
            step="0.01" 
            name="salario" 
            class="form-control" 
            value="{{ old('salario', $empleado->salario) }}" 
            required
        >
    </div>

   
    <div class="col-md-4">
        <label class="form-label required">Fecha de ingreso</label>
        <input 
            type="date" 
            name="fecha_ingreso" 
            class="form-control" 
            value="{{ old('fecha_ingreso', $empleado->fecha_ingreso?->format('Y-m-d')) }}" 
            required
        >
    </div>

   
    <div class="col-md-4">
        <label class="form-label required">Estado</label>
        <select name="estado" class="form-select" required>
            <option value="Activo" @selected(old('estado', $empleado->estado ?? 'Activo') === 'Activo')>Activo</option>
            <option value="Inactivo" @selected(old('estado', $empleado->estado) === 'Inactivo')>Inactivo</option>
        </select>
    </div>
</div>