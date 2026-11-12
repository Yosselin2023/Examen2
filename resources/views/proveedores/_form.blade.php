<div class="row g-3">
    <div class="col-md-4">
        <label class="form-label required">RTN (14 dígitos)</label>
        <input name="rtn" maxlength="14" minlength="14" pattern="[0-9]{14}" class="form-control" value="{{ old('rtn', $proveedor->rtn) }}" required>
    </div>
    <div class="col-md-8">
        <label class="form-label required">Empresa</label>
        <input name="empresa" class="form-control" value="{{ old('empresa', $proveedor->empresa) }}" required>
    </div>
    <div class="col-md-4">
        <label class="form-label required">Contacto / Asesor comercial</label>
        <input name="contacto" class="form-control" value="{{ old('contacto', $proveedor->contacto) }}" required>
    </div>
    <div class="col-md-4">
        <label class="form-label required">Teléfono (8 dígitos)</label>
        <input name="telefono" maxlength="8" minlength="8" pattern="[2389][0-9]{7}" class="form-control" value="{{ old('telefono', $proveedor->telefono) }}" required>
    </div>
    <div class="col-md-4">
        <label class="form-label required">Categoría</label>
        <select name="categoria" class="form-select" required>
            <option value="">Seleccione</option>
            @foreach(['Fármacos', 'Material Quirúrgico', 'Equipos'] as $v)
                <option @selected(old('categoria', $proveedor->categoria) === $v)>{{ $v }}</option>
            @endforeach
        </select>
    </div>
    <div class="col-md-4">
        <label class="form-label required">Límite de crédito (L.)</label>
        <input type="number" min="0" step="0.01" name="limite_credito" class="form-control" value="{{ old('limite_credito', $proveedor->limite_credito ?? 0) }}" required>
    </div>
    <div class="col-md-4">
        <label class="form-label required">Días de crédito</label>
        <select name="dias_credito" class="form-select" required>
            @foreach([15, 30, 45, 60] as $v)
                <option value="{{ $v }}" @selected(old('dias_credito', $proveedor->dias_credito) == $v)>{{ $v }} días</option>
            @endforeach
        </select>
    </div>
    <div class="col-md-4">
        <label class="form-label required">Estado</label>
        <select name="estado" class="form-select">
            <option @selected(old('estado', $proveedor->estado ?? 'Activo') === 'Activo')>Activo</option>
            <option @selected(old('estado', $proveedor->estado) === 'Inactivo')>Inactivo</option>
        </select>
    </div>
</div>