<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Productos</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
    <style>
        body { font-family: Arial, sans-serif; margin: 40px; background: #f4f6f8; }
        h1 { color: #0a2a5e; }
        table { width: 100%; border-collapse: collapse; background: #fff; }
        th, td { padding: 10px; border-bottom: 1px solid #ddd; text-align: left; }
        th { background: #1599df; color: #fff; }
        .btn { display: inline-block; padding: 8px 16px; background: #1599df; color: #fff; text-decoration: none; border-radius: 6px; }
        .form-box { background: #fff; padding: 20px; border-radius: 10px; max-width: 600px; }
        input, select, textarea { width: 100%; padding: 8px; margin: 6px 0; border: 1px solid #ccc; border-radius: 4px; }
    </style>
</head>
<body>
    <h1>Productos</h1>
    <a href="{{ route('productos.crear') }}" class="btn"><i class="fa-solid fa-plus"></i> Nuevo producto</a>
    <a href="{{ route('productos.editar') }}" class="btn"><i class="fa-solid fa-edit"></i> Editar producto</a>

    @if(session('mensaje'))
        <div style="background:#e0ffe0; padding:10px; margin:15px 0; border-left:4px solid #388e3c;">{{ session('mensaje') }}</div>
    @endif

    <table>
        <thead>
            <tr>
                <th>ID</th><th>Nombre</th><th>Código</th><th>Precio</th><th>Stock</th><th>Categoría</th><th>Proveedor</th>
            </tr>
        </thead>
        <tbody>
            @forelse($productos as $p)
            <tr>
                <td>{{ $p->id_producto }}</td>
                <td>{{ $p->nombre }}</td>
                <td>{{ $p->codigo }}</td>
                <td>${{ $p->precio }}</td>
                <td>{{ $p->stock }}</td>
                <td>{{ $p->categoria_nombre }}</td>
                <td>{{ $p->proveedor_nombre ?? '-' }}</td>
            </tr>
            @empty
            <tr><td colspan="7">No hay productos registrados.</td></tr>
            @endforelse
        </tbody>
    </table>
</body>
</html>
