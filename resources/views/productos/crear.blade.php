<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Crear Producto</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <style>
        body { font-family: Arial, sans-serif; margin: 40px; background: #f4f6f8; }
        .form-box { max-width: 600px; background: #fff; padding: 25px; border-radius: 10px; box-shadow: 0 2px 8px rgba(0,0,0,0.06); }
        h1 { color: #0a2a5e; }
        input, select, textarea { width: 100%; padding: 8px; margin: 6px 0; border: 1px solid #ccc; border-radius: 4px; }
        .btn { background: #1599df; color: #fff; padding: 10px 20px; border: none; border-radius: 6px; cursor: pointer; }
        .error { color: #d32f2f; font-size: 13px; }
    </style>
</head>
<body>
    <h1>Registrar Producto</h1>
    <div class="form-box">
        <form action="{{ route('productos.guardar') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <label>Nombre *</label>
            <input type="text" name="nombre" value="{{ old('nombre') }}" required maxlength="150">
            @error('nombre')<div class="error">{{ $message }}</div>@enderror

            <label>Código *</label>
            <input type="text" name="codigo" value="{{ old('codigo') }}" required maxlength="50">
            @error('codigo')<div class="error">{{ $message }}</div>@enderror

            <label>Descripción</label>
            <textarea name="descripcion">{{ old('descripcion') }}</textarea>

            <label>Precio *</label>
            <input type="number" step="0.01" name="precio" value="{{ old('precio') }}" required min="0">
            @error('precio')<div class="error">{{ $message }}</div>@enderror

            <label>Stock *</label>
            <input type="number" name="stock" value="{{ old('stock', 0) }}" required min="0">
            @error('stock')<div class="error">{{ $message }}</div>@enderror

            <label>Proveedor</label>
            <select name="proveedor">
                <option value="">-- Sin proveedor --</option>
                @foreach($proveedores as $prov)
                    <option value="{{ $prov->id_proveedor }}" {{ old('proveedor') == $prov->id_proveedor ? 'selected' : '' }}>
                        {{ $prov->razonsocial }}
                    </option>
                @endforeach
            </select>
            @error('proveedor')<div class="error">{{ $message }}</div>@enderror

            <label>Categoría *</label>
            <select name="id_categoria" required>
                <option value="">-- Seleccionar categoría --</option>
                @foreach($categorias as $cat)
                    <option value="{{ $cat->id_categoria }}" {{ old('id_categoria') == $cat->id_categoria ? 'selected' : '' }}>
                        {{ $cat->nombre }}
                    </option>
                @endforeach
            </select>
            @error('id_categoria')<div class="error">{{ $message }}</div>@enderror

            <label>Imagen del producto</label>
            <input type="file" name="imagen" accept="image/*" style="width:100%; padding:6px;">
            @error('imagen')<div class="error">{{ $message }}</div>@enderror

            <br>
            <button type="submit" class="btn">Guardar producto</button>
            <a href="{{ route('productos.index') }}" style="margin-left:10px;">Volver</a>
        </form>
    </div>
</body>
</html>
